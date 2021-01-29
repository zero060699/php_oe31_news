<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_view_admin_english()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser
                ->loginAs($user)
                ->visit('/dashboard')
                ->click('@languagess')
                ->clickLink('English')
                ->assertSee('Admin')
                ->assertSee('Category')
                ->assertSee('Post')
                ->assertSee('User')
                ->assertSee('Request writer');
        });
    }

    public function test_view_admin_vietnam()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
                ->click('@languagess')
                ->clickLink('Việt Nam')
                ->assertSee('Quản trị')
                ->assertSee('Danh mục')
                ->assertSee('Bài viết')
                ->assertSee('Người dùng')
                ->assertSee('Yêu cầu viết');
        });
    }

    public function test_view_admin_logout()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.logouttt')
                ->click('@logoutt')
                ->assertGuest();
        });
    }

    public function test_view_admin_sidebar_category()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.categoryyy')
                ->assertSee('Category')
                ->click('.categoryes')
                ->assertPathIs('/categories');
        });
    }

    public function test_view_admin_sidebar_post()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.posttt')
                ->assertSee('Post')
                ->click('.postes')
                ->assertPathIs('/posts');
        });
    }

    public function test_view_admin_sidebar_post_request_post()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.posttt')
                ->waitForText('Request post')
                ->click('.requestposttt')
                ->assertPathIs('/postRequest');
        });
    }

    public function test_view_admin_sidebar_user()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.userrr')
                ->assertSee('User')
                ->click('.userss')
                ->assertPathIs('/users');
        });
    }

    public function test_view_admin_sidebar_user_author()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.userrr')
                ->waitForText('Author')
                ->click('.authorrr')
                ->assertPathIs('/authors');
        });
    }

    public function test_view_admin_sidebar_request_writer()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->click('.requesttt')
                ->assertSee('Author')
                ->click('.requestrrr')
                ->assertPathIs('/requests');
        });
    }
}
