<?php
use App\Repositories\System\PostRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * @author Chrisostomos Bakouras.
 */
class OptionsTableSeeder extends \Illuminate\Database\Seeder
{
    protected $postRepository;
    /**
     * OptionsTableSeeder constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'name' => 'site-name',
            'value' => 'My Blog',
        ]);
        DB::table('options')->insert([
            'name' => 'post-sidebar-right',
            'value' => 'false',
        ]);
        DB::table('options')->insert([
            'name' => 'post-sidebar-left',
            'value' => 'true',
        ]);
        DB::table('options')->insert([
            'name' => 'page-sidebar-right',
            'value' => 'true',
        ]);
        DB::table('options')->insert([
            'name' => 'page-sidebar-left',
            'value' => 'true',
        ]);
        DB::table('options')->insert([
            'name' => 'default-category-id',
            'value' => '1',
        ]);
        $pageId = $this->postRepository->findAllWithTypePaginated('page')->first()->id;
        DB::table('options')->insert([
            'name' => 'front-page-id',
            'value' => $pageId,
        ]);

        $this->postRepository->update(['view_template' => Config::get('blog.post.templates.frontPage')], $pageId);
    }
}