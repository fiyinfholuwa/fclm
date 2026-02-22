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
    protected function sendClientMail_old($enquiry)
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

        $headers = "From: Ministry <noreply@fclmng.org>";

        @mail($to, $subject, $message, $headers);
    }

    protected function sendClientMail($enquiry)
{
    $to = $enquiry->email;
    $subject = "We Received Your Message";

    // Build the HTML message
    $message = "
    <html>
    <head>
        <title>We Received Your Message</title>
        <style>
            body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { font-size: 20px; font-weight: bold; margin-bottom: 20px; color: #1a202c; }
            .content { font-size: 16px; }
            .footer { margin-top: 30px; font-size: 14px; color: #555; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>Hello {$enquiry->full_name},</div>
            <div class='content'>
                <p>Thank you for contacting us concerning your needs. We shall endeavour to respond as soon as possible.</p>
                <p>In the meantime, take note that <strong>Jesus loves you</strong> and His grace is sufficient for you.</p>
                <p>Your spiritual welfare is our deepest concern.</p>
            </div>
            <div class='footer'>
                <p>Shalom!</p>
                <p>— Ministry</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Set the headers for HTML email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Ministry <noreply@fclmng.org>\r\n";
    $headers .= "Reply-To: noreply@fclmng.org\r\n";

    // Send the email
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