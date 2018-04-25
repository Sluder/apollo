<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeploymentPlanRequest;
use App\Models\DeploymentPlan;

class DeploymentPlanController extends Controller
{
    /**
     * View for displaying all deployment plans
     */
    public function view()
    {
        return view('pages.deployment_plans.view');
    }

    /**
     * View for creating a deployment plan
     */
    public function create()
    {
        return view('pages.deployment_plans.create');
    }

    /**
     * View for updating existing DeploymentPlan $plan
     */
    public function edit(DeploymentPlan $plan)
    {
        return view('pages.deployment_plans.edit', compact('plan'));
    }

    /**
     * Store new deployment plan
     */
    public function store(DeploymentPlanRequest $request)
    {
        $plan = DeploymentPlan::create([
            'name' => $request->get('name'),
            'environment_id' => $request->get('environment_id'),
            'repository_id' => $request->get('repository_id'),
            'repository_branch' => $request->get('repository_branch'),
            'is_automatic' => $request->get('is_automatic'),
            'remote_path' => $request->get('remote_path'),
        ]);

        return redirect()->route('view.deployment-plans')->with(['message' => 'Successfully created deployment plan \'' . $plan->name . '\'']);
    }

    /**
     * Update existing DeploymentPlan $plan
     */
    public function update(DeploymentPlanRequest $request, DeploymentPlan $plan)
    {
        $plan->update([
            'name' => $request->get('name'),
            'environment_id' => $request->get('environment_id'),
            'repository_id' => $request->get('repository_id'),
            'repository_branch' => $request->get('repository_branch'),
            'is_automatic' => $request->get('is_automatic'),
            'remote_path' => $request->get('remote_path'),
        ]);

        return redirect()->route('view.deployment-plans')->with(['message' => 'Successfully updated deployment plan \'' . $plan->name . '\'']);
    }

    /**
     * Delete existing DeploymentPlan $plan
     */
    public function delete(DeploymentPlan $plan)
    {
        $plan->delete();

        return redirect()->route('view.deployment-plans')->with(['message' => 'Successfully deleted deployment plan']);
    }

}
