<?php

namespace App\Http\Resources;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Expr\Cast\Object_;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $users = array();
        $projects = Project::find($this->id)->usersAssigned;
        foreach ($projects as $project) {
            $users[] = $project->name;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_by' => User::find($this->user_id)->name,
            'start_date' => $this->start_date,
            'dead_line' => $this->dead_line,
            'users' => count($users),
            'tasks' => TaskResource::collection($this->tasks),
        ];
    }
}
