<?php

namespace App\Actions\Roles;

use App\Models\Role;
use App\Models\Rucher;

class AssocierTousRuchersARole
{
    public function execute(int $exploitationId, Role $role): void
    {
        $ruchers = Rucher::where("exploitation_id", $exploitationId)->get();
        $role->ruchers()->syncWithPivotValues($ruchers->pluck('id'), ["peut_modifier" => true, "peut_lire" => true]);
    }
}
