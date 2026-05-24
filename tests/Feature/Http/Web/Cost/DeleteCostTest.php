<?php

beforeEach(function () {

    $this->url = route('costs.destroy', $this->cost);
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->delete($this->url)->assertRedirect(route('auth'));
    });

    it('renders successfuly to authenticated owner', function () {

        $this->actingAs($this->cost->user)->delete($this->url)->assertRedirect(route('costs.index'));
    });

    it('denies access to authenticated non-owner user', function () {

        $this->actingAs($this->otherUser)->delete($this->url)->assertForbidden();
    });
});
