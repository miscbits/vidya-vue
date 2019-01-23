<?php

namespace Tests\Browser;

use App\User;
use App\Video;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VideoTest extends DuskTestCase
{

    use DatabaseMigrations;

    private $user;

    public function setUp() {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * Go to a video's page and see that it's content is displayed on the 
     * page and there is a video element with the correct video source
     *
     * @return void
     */
    public function testViewVideo()
    {

        $video = Video::create([
            'title' => 'Example Video',
            'subtitle' => 'Basic Tutorial',
            'description' => 'In this tutorial we will go over the basics of an if statement in javascript and talk about what we can do with if blocks',
            'file_location' => '/videos/javascript-if.mp4',
        ]);

        $this->browse(function (Browser $browser) use ($video) {
            $response = $browser->loginAs($this->user)
                    ->visit(route('videos.show', ['id' => $video->id]));

            $src_attribute = $browser->attribute('video > source', 'src');

            $this->assertContains($video->file_location, $src_attribute);
            $response->assertSee('Example Video');
            $response->assertSee('Basic Tutorial');
            $response->assertSee('In this tutorial we will go over the basics of an if statement in javascript and talk about what we can do with if blocks');
        });

    }

}
