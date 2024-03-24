@extends('layouts.mail')
@section('content')

    <!--span class="preheader">This is preheader text. Some clients will show this text as a preview.</span-->
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">
        <!-- START MAIN CONTENT AREA -->
        <tr>
            <td style="text-align:center; padding-top:1rem;">
                <img width="200" src="{{ settings->get('logo_dark') }}" alt="Logo">
            </td>
        </tr>
        <tr>
            <td class="wrapper">
                <p>Hi {{ $name }},</p>
                <p>Welcome to our platform! To get started, please confirm your email address by clicking the button below:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td><a href="{{ $confirmationLink }}" target="_blank">Confirm Email</a></td>
                        </tr>
                    </tbody>
                </table>
                <p>If you're having trouble clicking the "Confirm Email" button, copy and paste the following URL into your web browser:</p>
                <p>{{ $confirmationLink }}</p>
                <p>Thank you for joining us! We're excited to have you on board.</p>
                <p>Best regards,</p>
                <p> {{ getenv('app_name') }} </p>
            </td>
        </tr>
        <!-- END MAIN CONTENT AREA -->
    </table>

@endsection