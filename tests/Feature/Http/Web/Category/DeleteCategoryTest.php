<?php


beforeEach(function () {
    $this->url = route('categories.destroy', $this->category);
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->delete($this->url)->assertRedirect(route('auth'));
    });

    it('renders successfuly to authenticated owner', function () {

        $this->actingAs($this->user)->delete($this->url)->assertRedirect(route('categories.index'));
    });

    it('denies access to authenticated non-owner user', function () {

        $this->actingAs($this->otherUser)->delete($this->url)->assertForbidden();
    });
});
