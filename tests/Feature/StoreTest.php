<?php

use App\Models\Contact;

test('can store a contact', function () {
    login()->post('/contacts', [
        'first_name' => "wali",
        'last_name' => "hassan",
        'email' => "wali@test.com",
        'phone' => "123-456",
        'address' => "1 test street",
        'city' => "khartoum",
        'region' => "lorem",
        'country' => "xol",
        'postal_code' => "121",
    ])->assertRedirect('/contacts')->assertSessionHas('success', 'Contact created.');

    $contact = Contact::lastest()->first();
    expect($contact->first_name)->toBeString()->not->toBeEmpty();
});
