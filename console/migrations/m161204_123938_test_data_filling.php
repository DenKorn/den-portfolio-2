<?php

use common\models\CommonInfo;
use yii\db\Migration;

class m161204_123938_test_data_filling extends Migration
{
    public function safeUp()
    {

        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'about_header';
        $commonInfo->info_content = 'BRIEFLY ABOUT ME';
        $commonInfo->save();
        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'about_content_1';
        $commonInfo->info_content = 'Friends call me Dan. I am 20 years lod, now I studying on 3rd year of university in speciality
        "Computer science".';
        $commonInfo->save();
        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'about_content_2';
        $commonInfo->info_content = 'I\'m also like to get insight into web technologies, like JS with WebGL and AudioAPI, PHP with Yii2 and of course MySQL.
        Check out my github to see some of my projects';
        $commonInfo->save();
        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'about_github_link';
        $commonInfo->info_content = 'My GitHub: <a href="https://github.com/DenKorn">link</a>';
        $commonInfo->save();

        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'home_header';
        $commonInfo->info_content = 'WELCOME TO MY PORTFOLIO!';
        $commonInfo->save();
        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'home_body_content_1';
        $commonInfo->info_content = 'You are on page portfolio web developer! Perhaps you were looking for me, maybe not.';
        $commonInfo->save();
        $commonInfo = new CommonInfo();
        $commonInfo->info_header = 'home_body_content_2';
        $commonInfo->info_content = 'Anyway, I hope that you will like how this site and its contents! Have a nice day!';
        $commonInfo->save();
    }

    public function safeDown()
    {
        $this->delete('achievements');
        $this->delete('contacts');
        $this->delete('projects');
        $this->delete('common_info');
        return true;
    }
}
