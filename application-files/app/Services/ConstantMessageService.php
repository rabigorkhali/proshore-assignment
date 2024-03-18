<?php
namespace App\Services;

class ConstantMessageService
{
    const NOUSERNAME = 'Username doesnot exist.';
    const JSONPARSEERROR = 'JSON parse error - Expecting property name at line 1 column 2 (char 1).';
    const PASSWORDCHANGED = 'Your Password has been changed sucessfully';
    
    const VALIDTOKEN = 'Valid Token';
    const INVALIDCREDENTIALS = 'Invalid Credentials';

    const ResetPassword = 'Reset Password.';

    const INVALIDID = "Invalid ID";
    const SERVERERROR = 'Server Error.';
    const DATANOTFOUND = 'Data Not found.';
    const NOCONTENT = 'NO Content.';
    const UNAUTHORIZED = 'UNAUTHORIZED';
    const UNPROCESSABLEENTITY = 'Unprocessable Entity';
    const FORBIDDEN = 'FORBIDDEN';

    const LOGOUTMESSAGE = 'Logout Successfully.';
    const PROFILEUPDATESUCCESSFULL = 'Profile successfully updated.';
    const CREATESUCCESSFULL = 'Created successfully.';
    const UPDATESUCCESSFULL = 'Updated successfully.';
    const EMAILSENT = 'Email sent successfully.';
    const INVALIDEMAILCONFIG = 'Invalid email config setup or something went wrong.';

}