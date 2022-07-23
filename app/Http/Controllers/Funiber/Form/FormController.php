<?php

namespace App\Http\Controllers\Funiber\Form;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Funiber\Area\Area;
use App\Models\Funiber\Form\Form;
use App\Models\Funiber\Program\Program;
use App\Models\Funiber\Template\TemplateEmail;
use Carbon\Carbon;

class FormController extends Controller
{
    /**
     * Método para llamar toda la lista de registro de formularios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = 'asc';
        $perPage = 10;

        return Form::orderBy('updated_at', $order)
            ->paginate(
                request(
                    'per_page',
                    \Request::get('per_page') ?? $perPage
                )
            );
    }

    /**
     * Método para guardar un nuevo registros, validado por medio de reglas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Form::createdRules($request->all());
        if ($validator->fails()) {
            return response()->json(['isvalid' => false, 'errors' => $validator->messages()], 422);
        }

        $input['name'] = $request->name;
        $input['lastname'] = $request->lastname;
        $input['email'] = $request->email;
        $input['phone'] = $request->phone;
        $input['country'] = $request->country;
        $input['state'] = $request->state;
        $input['city'] = $request->city;
        $input['comments'] = $request->comments;
        $input['policy_acceptance_check'] = $request->policy_acceptance_check;
        $input['program_id'] = $request->program_id;
        $input['area_id'] = $request->area_id;
        $input['program_id'] = $request->program_id;

        $objForm = Form::create($input);

        $this->sendEmail($objForm);

        return response()->json([
            'objForm' => $objForm
        ]);
    }

    /* Método para el envio de correos */
    public function sendEmail($objForm)
    {
        $objTemplateEmail = TemplateEmail::select('template')->where('short_code', '=', 'T1')->first();
        $objArea = Area::where('id', $objForm->area_id)->first();
        $objProgram = Program::where('id', $objForm->program_id)->first();
        $tagEmail = array("{{fullname}}", "{{area}}", "{{program}}", "{{emailUser}}", "{{phoneUser}}", "{{countryUser}}", "{{stateUser}}", "{{cityUser}}", "{{commentUser}}");
        $textEmail = array($objForm->name . ' ' . $objForm->lastname, $objArea->name, $objProgram->name, $objForm->email, $objForm->phone, $objForm->country, $objForm->state, $objForm->city,  $objForm->comments);
        SendEmailJob::dispatch($tagEmail, $textEmail, $objTemplateEmail->template, $objForm->email)->delay(Carbon::now()->addMinutes(1));
    }
}
