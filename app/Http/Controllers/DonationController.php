<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Donation;
use App\Models\Project;
use DateTime;
use Config;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
	public function index()
    {
    	$donations = Donation::get();

        return view('admin.donation.index', compact('donations'));
    }


    public function show(Request $reuest)
    {
    	$donations = Donation::where('project_id', $reuest->id);

    	if (!$donations->exists()) {
    		return redirect()->back()->with(['error_message' => 'not found any donations of this projects']);
    	}

    	$donations = $donations->get();
        return view('admin.donation.show', compact('donations'));
    }


    public function billing(Request $request){
        $project_id = Crypt::decrypt($request->id);
        $project = Project::find($project_id);

        // return view('checkout-copy', compact('project'));
        return view('pay-donation', compact('project'));
    }

    public function donated(Request $request){

        $project_id = $request->project_id;
        $donation_id = $request->donation_id;

        Donation::where('id', $donation_id)->update(['status'=>'donated']);

        return redirect()->route('frontend')->with([
              'successful_message' => 'Thank you for your donation of this project.', 
          ]);
    }

    public function confirm(Request $request){
        
        
        // dd($request);
        
        $auth_token = $request->auth_token;
        $project_id = $request->id;
        $donation_id = $request->donation_id;

        $donation = Donation::where('id', $donation_id);

        $donation->update(['status'=>'confirmed']);
        $donated = $donation->first(['donated']);

        $POST_BACK_URL2 = route('donated-confirmed', ['project_id' => $project_id, 'donation_id' => $donation_id]);

        $project = Project::find($project_id);

        return view('confirm', compact('project', 'auth_token', 'POST_BACK_URL2', 'donated'));
    }

    public function checkout(Request $request){
      
        $project_id = $request->project_id;
        $project_goal = $request->project_goal;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $donate = number_format($request->donate,2);
        $paymentMethod = $request->paymentMethod;

        $dateTime      = new DateTime();
        $transRefNum = $dateTime->format('YmdHis'); 

        $ExpiryDateTime = $dateTime;
        $ExpiryDateTime->modify('+' . 1 . ' hours');
        $expiryDate = $ExpiryDateTime->format('Ymd His'); 

        $donationArr = array(
            'project_id' => $project_id,
            'goal' => $project_goal,
            'donated' => $donate,
            'donor' => $firstName.' '.$lastName,
            'email' => $email,
            'payment_method' => $paymentMethod,
        );

        $saveDonate = Donation::create($donationArr);

        $donation_id = $saveDonate->id;


        $POST_BACK_URL1 = route('checkout-confirm', ['id' => $project_id, 'donation_id' => $donation_id]);
        $STORE_ID = '22504';
        $HASH_KEY = 'FOV7AV5EOCF1GQCP';

        $post_data =  array(
            "storeId"           => $STORE_ID,
            "amount"            => $donate,
            "postBackURL"       => $POST_BACK_URL1,
            "orderRefNum"       => $transRefNum,
            "expiryDate"        => $expiryDate,         //Optional
            "merchantHashedReq" => "",                  //Optional
            "autoRedirect"      => "1",                 //Optional
            "paymentMethod"     => "MA_PAYMENT_METHOD",  //Optional MA_PAYMENT_METHOD
        );

        //$sorted_string
        //make an alphabetically ordered string using $post_data array above
        //and skip the blank fields in $post_data array
        $sortedArray = $post_data;
        ksort($sortedArray);
        $sorted_string = '';
        $i = 1;

        foreach($sortedArray as $key => $value){
            if(!empty($value))
            {
                if($i == 1)
                {
                    $sorted_string = $key. '=' .$value;
                }
                else
                {
                    $sorted_string = $sorted_string . '&' . $key. '=' .$value;
                }
            }
            $i++;
        }  


        // AES/ECB/PKCS5Padding algorithm
        $cipher = "aes-128-ecb";
        $crypttext = openssl_encrypt($sorted_string, $cipher, $HASH_KEY, OPENSSL_RAW_DATA);
        $HashedRequest = Base64_encode($crypttext);
        //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

        $post_data['merchantHashedReq'] =  $HashedRequest;

        $project = Project::find($project_id);
        return view('checkout', compact('project', 'post_data'));

      
    }
    
    
    public function submitDonation(Request $request){

        // dd($request);
        $doner = Auth::user();
        $number = $request->number;
        $donate = number_format($request->donate,2);
        // $donate = $request->donate;
        $project_id = $request->project_id;
        $project_goal = $request->project_goal;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $paymentMethod = $request->paymentMethod;

        $dateTime      = new DateTime();
        $transRefNum = $dateTime->format('YmdHis');


        //  '{
        // "orderId": "00001",
        // "storeId": "22504",
        // "transactionAmount": "0.50",
        // "transactionType": "MA",
        // "mobileAccountNo": $number,  //03449685354
        // "emailAddress": "marif964@hotmail.com"
        // }'

        $post_data = array(
            "orderId"=> $transRefNum,
            "storeId"=> "22504",
            "transactionAmount"=> $donate,
            "transactionType"=> "MA",
            "mobileAccountNo"=> $number,
            "emailAddress"=> "marif964@hotmail.com"
         );



        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://easypaystg.easypaisa.com.pk/easypay-service/rest/v4/initiate-ma-transaction',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($post_data),
          CURLOPT_HTTPHEADER => array(
            'Credentials: QVJDUEs6NmUwMjdmNmZjY2M3ODU2NTIxNDc3N2U1YTU0OGM1OGE=',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseObj = json_decode($response);

        if ($responseObj->responseCode == '0000') {
            
            $donationArr = array(
                'doner_id' => $doner->id,
                'project_id' => $project_id,
                'goal' => $project_goal,
                'donated' => $donate,
                'donor' => $firstName.' '.$lastName,
                'email' => $email,
                'payment_method' => $paymentMethod,
            );

            $saveDonate = Donation::create($donationArr);

        }
        
        echo $response; 
        
        
        // $donationArr = array(
        //         'doner_id' => $doner->id,
        //         'project_id' => $project_id,
        //         'goal' => $project_goal,
        //         'donated' => $donate,
        //         'donor' => $firstName.' '.$lastName,
        //         'email' => $email,
        //         'payment_method' => $paymentMethod,
        //     );

        // $saveDonate = Donation::create($donationArr);
        // return (!empty($saveDonate)) ? TRUE : FALSE;
        

       
    }

    public function destroy(Request $request){

        $donationId = $request->id;

        $donation = Donation::find($donationId);

        if ($donation->delete()) {
            return redirect()->route('admin.project-list')->with("successful_message","donation is deleted successfully.");
        }else{
            return redirect()->back()->with("error_message","donation not deleted something went wrong.");
        }
    }
}
