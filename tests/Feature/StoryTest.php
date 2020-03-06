<?php

namespace Tests\Feature;

use App\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoryTest extends TestCase {
    use RefreshDatabase, WithFaker;

    public function test_a_story_can_be_created() {
        $this->withoutExceptionHandling();
        $this->getJson( '/api/story/create' )->assertOk();
        $attr = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph
        ];
        $this->postJson( '/api/stories', $attr )
             ->assertStatus( 201 )
             ->assertSeeText( 'created' )
             ->assertJson( $attr );
    }
}
