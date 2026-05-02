<?php


beforeEach(function () {

    $this->redirectUrl = route('auth.google.redirect');
    $this->callbackUrl = route('auth.google.callback');
});



/**
 * Status tests
 */
describe('http status tests', function () {

    it('redirect a guest to gooole', function () {
        $this->get($this->redirectUrl)->assertStatus(302);
    });

    it('denies logged in user to access redirection', function () {

        $this->actingAs($this->user)->get($this->redirectUrl)->assertRedirect(route('home'));
    });


    it('redirect a guest back to app', function () {
        $this->get($this->callbackUrl)->assertStatus(302);
    });

    it('denies logged in user to access callback ', function () {

        $this->actingAs($this->user)->get($this->callbackUrl)->assertRedirect(route('home'));
    });
});
