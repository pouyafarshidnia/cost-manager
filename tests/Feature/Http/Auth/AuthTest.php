<?php



beforeEach(function () {

    $this->url = route('auth');
});



/**
 * Status tests
 */
describe('http status tests', function () {

    it('renders successfuly for a guest', function () {
        $this->get($this->url)->assertStatus(200);
    });

    it('redirects logged in user', function () {

        $this->actingAs($this->user)->get($this->url)->assertRedirect();
    });
});



/**
 * View & Data
 */
describe('view & data tests', function () {

    it('loads proper view', function () {
        $this->get($this->url)->assertViewIs('auth.index');
    });
});
