<?php



beforeEach(function () {

    $this->url = route('categories.update', $this->category);
    $this->data = ['title' => fake()->name()];
});



/**
 * Access
 */
describe('access tests', function () {

    it('denies access to guests', function () {

        $this->put($this->url, $this->data)->assertRedirect(route('auth'));
    });

    it('renders successfuly to authenticated owner', function () {

        $this->actingAs($this->user)->put($this->url, $this->data)->assertRedirect(route('categories.index'));
    });

    it('denies access to authenticated non-owner user', function () {

        $this->actingAs($this->otherUser)->put($this->url, $this->data)->assertForbidden();
    });
});


/**
 * Validations
 */
describe('validation tests', function () {


    it('validates title field properly', function (?string $title) {

        $this->actingAs($this->user)->put($this->url, ['title' => $title])->assertSessionHasErrors('title');
    })->with([null, '', str_repeat('a', 256)]);
});
