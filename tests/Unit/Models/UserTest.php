<?php

use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create()->fresh();
});



/**
 * Columns
 */
test('to array', function () {

    $model_fields = array_keys($this->user->toArray());

    $expected_fields = [
        'id',
        'name',
        'email',
        'picture',
        'created_at',
        'updated_at',
    ];

    sort($model_fields);
    sort($expected_fields);

    expect($model_fields)->toEqual($expected_fields);
});



/**
 * Casts
 */
// describe('cast tests', function () {

//     it('casts status to enum', function () {
//         expect($this->agent->status)->toBeInstanceOf(AgentStatus::class);
//     });

//     it('casts type to enum', function () {
//         expect($this->agent->type)->toBeInstanceOf(AgentType::class);
//     });

//     it('casts gender to enum', function () {
//         expect($this->agent->gender)->toBeInstanceOf(AgentGender::class);
//     });
// });



/**
 * Attributes
 */
// describe('attribute tests', function () {

//     it('has picture url attribute', function () {

//         $agent = Agent::factory()->create(['picture' => null]);

//         expect($agent->picture_url)->toBeString();
//     });
// });


/**
 * Relations
 */
// describe('relation tests', function () {

//     it('has customers', function () {
//         $agent = Agent::factory()->hasCustomers(5)->create()->fresh();

//         expect($agent->customers)->toHaveCount(5);
//     });

//     it('has files', function () {
//         $agent = Agent::factory()->hasFiles(3)->create()->fresh();

//         expect($agent->files)->toHaveCount(3);
//     });
// });



/**
 * Commands
 */
// describe('command tests', function () {

//     it('can activate agent', function () {
//         $agent = Agent::factory()->inactive()->create()->fresh();

//         expect($agent->status)->toBe(AgentStatus::Deactive);

//         $agent->activate();

//         expect($agent->fresh()->status)->toBe(AgentStatus::Active);
//     });


//     it('can deactivate agent', function () {
//         $agent = Agent::factory()->active()->create()->fresh();

//         expect($agent->status)->toBe(AgentStatus::Active);

//         $agent->deactivate();

//         expect($agent->fresh()->status)->toBe(AgentStatus::Deactive);
//     });
// });





/**
 * Condition
 */
// describe('condition tests', function () {

//     it('can detect if agent is active', function () {
//         $activeAgent = Agent::factory()->active()->create();

//         expect($activeAgent->isActive())->toBeTrue();
//     });

//     it('can detect if agent is inactive', function () {
//         $inactiveAgent = Agent::factory()->inactive()->create();

//         expect($inactiveAgent->isDeactive())->toBeTrue();
//     });

//     it('can detect password matching', function () {
//         expect($this->agent->passwordMatched('password'))->toBeTrue();
//     });

//     it('can detect if agent is manager', function () {
//         $managerAgent = Agent::factory()->manager()->create();

//         expect($managerAgent->isManager())->toBeTrue();
//     });

//     it('can detect if agent is customer side', function () {
//         $customerSideAgent = Agent::factory()->customerSide()->create();

//         expect($customerSideAgent->isCustomerSide())->toBeTrue();
//     });

//     it('can detect if agent is file side', function () {
//         $fileSideAgent = Agent::factory()->fileSide()->create();

//         expect($fileSideAgent->isFileSide())->toBeTrue();
//     });
// });
