<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Project::truncate();

        $projects = include base_path('data/projects.php');

        foreach ($projects as $projectData) {
            $project = new Project();
            $project->title = $projectData['title'];
            $project->type_id = $projectData['type_id'];
            $project->status_id = $projectData['status_id'];
            $project->start_date = $projectData['start_date'];
            if ($project->status_id === '2') {
                $project->end_date = $projectData['end_date'];
            }
            $project->thumb = $projectData['thumb'];
            $project->language = $projectData['language'];
            $project->slug = Str::slug($projectData['title']);
            $project->save();
        }
    }
}
