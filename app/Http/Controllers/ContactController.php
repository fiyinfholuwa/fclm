<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEnquiry;

class ContactController extends Controller
{
    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required|string|max:20',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        $enquiry = ContactEnquiry::create($data);

        try{
            $this->sendClientMail($enquiry);

        }catch(Throwable  $e){

        }
        return response()->json([
            'status' => true,
            'message' => 'Message sent successfully'
        ]);
    }

    /**
     * Send email WITHOUT SMTP (raw PHP mail)
     */
    protected function sendClientMail($enquiry)
    {
        $to = $enquiry->email;
        $subject = "We Received Your Message";
        
        $message = "
        Hello {$enquiry->full_name},

        Thanks for contacting us concerning your needs.
        We shall endeavour to respond as soon as possible.

        In the meantime, take note that Jesus loves you
        and His grace is sufficient for you.

        Your spiritual welfare is our deepest concern.

        Shalom!
        ";

        $headers = "From: Ministry <noreply@yourdomain.com>";

        @mail($to, $subject, $message, $headers);
    }


    public function show($id)
    {
        $message = ContactEnquiry::findOrFail($id);
        return response()->json($message);
    }

    public function destroy($id)
    {
        $message = ContactEnquiry::findOrFail($id);
        $message->delete();

        return response()->json(['success' => true]);
    }
}
?>