<?php

namespace Tests\Browser\Frontend;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class IndexHomeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_login_home_index()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->make([
                'email' => 'test@gmail.com',
            ]);
            $browser->visit('/home')
                ->clickLink('Login')
                ->assertSee('Login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->click('.login')
                ->visit('/home')
                ->assertPathIs('/home');
        });
    }

    public function test_register_home_index()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->clickLink('Register')
                ->assertSee('Register')
                ->value('#name', 'Test')
                ->value('#email', 'test@gmail.com')
                ->value('#password', '12345678')
                ->value('#password-confirm', '12345678')
                ->click('.register')
                ->visit('/home')
                ->assertPathIs('/home');
        });
    }

    public function test_logout_home_index()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/home')
                ->click('.dropdown-toggle')
                ->click('@logout')
                ->assertPathIs('/home');
        });
    }

    public function test_category_view_home()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/home')
                ->click('@category')
                ->assertPathIs('/filter/26');
        });
    }

    public function test_view_home_english()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->click('@language')
                ->clickLink('English')
                ->assertSee('Breaking News')
                ->assertSee('Top Trending')
                ->assertSee('Home')
                ->assertSee('Category')
                ->assertSee('View')
                ->assertSee('Comments')
                ->assertSee('All Post');
        });
    }

    public function test_view_home_vietnam()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->click('@language')
                ->clickLink('Việt Nam')
                ->assertSee('Tin nóng hổi')
                ->assertSee('Xu hướng Hàng đầu')
                ->assertSee('Trang chủ')
                ->assertSee('Danh mục')
                ->assertSee('Lượt xem')
                ->assertSee('Bình luận')
                ->assertSee('Tất cả Bài viết');
        });
    }
}
