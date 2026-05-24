<?php


beforeEach(function () {

    $this->url = route('logout');
});



/**
 * Status tests
 */
describe('http status tests', function () {

    it('redirect guest users', function () {

        $this->get($this->url)->assertRedirect();
    });

    it('logs out the user and redirect', function () {

        $this->actingAs($this->user)->get($this->url)->assertRedirect();

        $this->assertGuest();
    });
});
