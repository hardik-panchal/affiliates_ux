<?php

/**
 * The central page where foxycart hook will capture the details
 * 
 * Wiki for foxycart:
 * http://wiki.foxycart.com/v/1.0/transaction_xml_datafeed
 * 
 * @author Dave Jay<dave.jay90@gmail.com>
 * @verion 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */
# Throw error if no data is received on foxy cart
if (!isset($_POST['FoxyData'])) {
    _ls("No payload recieved");
    die;
}

# capture the foxy cart data
$foxyCartData = _e($_POST["FoxyData"], false);

# Decrypt and convert to XML
$FoxyData_decrypted = foxycart_decrypt($_POST["FoxyData"]);

# load XML object into the cart
$xml = simplexml_load_string($FoxyData_decrypted, NULL, LIBXML_NOCDATA);


foreach ($xml->transactions->transaction as $transaction) {


    $is_multiship = 0;

    $customerData = array();
    $customerData['transaction_id'] = $transaction->id;
    $customerData['transaction_date'] = $transaction->transaction_date;
    $customerData['customer_ip'] = $transaction->customer_ip;
    $customerData['customer_id'] = $transaction->customer_id;
    $customerData['customer_first_name'] = $transaction->customer_first_name;
    $customerData['customer_last_name'] = $transaction->customer_last_name;
    $customerData['customer_company'] = $transaction->customer_company;
    $customerData['customer_email'] = $transaction->customer_email;
    $customerData['customer_password'] = $transaction->customer_password;
    $customerData['customer_address1'] = $transaction->customer_address1;
    $customerData['customer_address2'] = $transaction->customer_address2;
    $customerData['customer_city'] = $transaction->customer_city;
    $customerData['customer_state'] = $transaction->customer_state;
    $customerData['customer_postal_code'] = $transaction->customer_postal_code;
    $customerData['customer_country'] = $transaction->customer_country;
    $customerData['customer_phone'] = $transaction->customer_phone;


    array_walk($customerData, 'castString');

    //This is for a multi-ship store. The shipping addresses will go in a $shipto array with the address name as the key
    $shipto = array();
    foreach ($transaction->shipto_addresses->shipto_address as $shipto_address) {
        $is_multiship = 1;
        $shipto_name = (string) $shipto_address->address_name;
        $shipto[$shipto_name] = array(
            'first_name' => (string) $shipto_address->shipto_first_name,
            'last_name' => (string) $shipto_address->shipto_last_name,
            'company' => (string) $shipto_address->shipto_company,
            'address1' => (string) $shipto_address->shipto_address1,
            'address2' => (string) $shipto_address->shipto_address2,
            'city' => (string) $shipto_address->shipto_city,
            'state' => (string) $shipto_address->shipto_state,
            'postal_code' => (string) $shipto_address->shipto_postal_code,
            'country' => (string) $shipto_address->shipto_country,
            'shipping_service_description' => (string) $shipto_address->shipto_shipping_service_description,
            'subtotal' => (string) $shipto_address->shipto_subtotal,
            'tax_total' => (string) $shipto_address->shipto_tax_total,
            'shipping_total' => (string) $shipto_address->shipto_shipping_total,
            'total' => (string) $shipto_address->shipto_,
            'custom_fields' => array()
        );

        //Putting the Custom Fields in an array if they are there
        if (!empty($shipto_address->custom_fields)) {
            foreach ($shipto_address->custom_fields->custom_field as $custom_field) {
                $shipto[$shipto_name]['custom_fields'][(string) $custom_field->custom_field_name] = (string) $custom_field->custom_field_value;
            }
        }
    }

    //This is setup for a single ship store
    if (!$is_multiship) {
        $shipto_single = array();
        $shipto_single['shipping_first_name'] = (string) $transaction->shipping_first_name ? (string) $transaction->shipping_first_name : $customer_first_name;
        $shipto_single['shipping_last_name'] = (string) $transaction->shipping_last_name ? (string) $transaction->shipping_last_name : $customer_last_name;
        $shipto_single['shipping_company'] = (string) $transaction->shipping_company ? (string) $transaction->shipping_company : $customer_company;
        $shipto_single['shipping_address1'] = (string) $transaction->shipping_address1 ? (string) $transaction->shipping_address1 : $customer_address1;
        $shipto_single['shipping_address2'] = (string) $transaction->shipping_address2 ? (string) $transaction->shipping_address2 : $customer_address2;
        $shipto_single['shipping_city'] = (string) $transaction->shipping_city ? (string) $transaction->shipping_city : $customer_city;
        $shipto_single['shipping_state'] = (string) $transaction->shipping_state ? (string) $transaction->shipping_state : $customer_state;
        $shipto_single['shipping_postal_code'] = (string) $transaction->shipping_postal_code ? (string) $transaction->shipping_postal_code : $customer_postal_code;
        $shipto_single['shipping_country'] = (string) $transaction->shipping_country ? (string) $transaction->shipping_country : $customer_country;
        $shipto_single['shipping_phone'] = (string) $transaction->shipping_phone ? (string) $transaction->shipping_phone : $customer_phone;
        $shipto_single['shipto_shipping_service_description'] = (string) $transaction->shipto_shipping_service_description;
    }

    ##Custom fields for the transaction
    # Custom fields are not required
    # $custom_fields = array();
    # if (!empty($transaction->custom_fields)) {
    #    foreach ($transaction->custom_fields->custom_field as $custom_field) {
    #        $custom_fields[(string) $custom_field->custom_field_name] = (string) $custom_field->custom_field_value;
    #    }
    # }
    //For Each Transaction Detail
    foreach ($transaction->transaction_details->transaction_detail as $transaction_detail) {
        $product_data = array();
        $product_data['product_name'] = (string) $transaction_detail->product_name;
        $product_data['product_code'] = (string) $transaction_detail->product_code;
        $product_data['product_quantity'] = (int) $transaction_detail->product_quantity;
        $product_data['product_price'] = (double) $transaction_detail->product_price;
        $product_data['product_shipto'] = (double) $transaction_detail->shipto;
        $product_data['category_code'] = (string) $transaction_detail->category_code;
        $product_data['product_delivery_type'] = (string) $transaction_detail->product_delivery_type;
        $product_data['sub_token_url'] = (string) $transaction_detail->sub_token_url;
        $product_data['subscription_frequency'] = (string) $transaction_detail->subscription_frequency;
        $product_data['subscription_startdate'] = (string) $transaction_detail->subscription_startdate;
        $product_data['subscription_nextdate'] = (string) $transaction_detail->subscription_nextdate;
        $product_data['subscription_enddate'] = (string) $transaction_detail->subscription_enddate;

        #custom options for the product
        #Not required for now
        #$transaction_detail_options = array();
        #foreach ($transaction_detail->transaction_detail_options->transaction_detail_option as $transaction_detail_option) {
        #    $product_option_name = $transaction_detail_option->product_option_name;
        #    $product_option_value = (string) $transaction_detail_option->product_option_value;
        #    $price_mod = (double) $transaction_detail_option->price_mod;
        #    $weight_mod = (double) $transaction_detail_option->weight_mod;
        #}
    }
    $foxycart_data = array();
    $foxycart_data['customer'] = $customerData;
    $foxycart_data['product'] = $product_data;
    $foxycart_data['shipto_multiple'] = $shipto;
    $foxycart_data['shipto_single'] = $shipto_single;

    ShipOffers::_doPush($foxycart_data);
    //konnektive::_doPush($foxycart_data);
}


die;
