<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Project;
use DateTime;
use Config;

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
        return view('admin.show', compact('donations'));
    }


    public function billing(Request $request){
        $project = Project::find($request->id);

        return view('checkout-copy', compact('project'));
    }

    public function confirm(Request $request){
        
        
        $auth_token = $request->auth_token;
        $project_id = $request->id;
        $POST_BACK_URL2 = route('donated-confirmed', ['project_id'=>$project_id]);

        $project = Project::find($project_id);

        return view('confirm', compact('project', 'auth_token', 'POST_BACK_URL2'));
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


        $POST_BACK_URL1 = route('checkout-confirm', ['id' => $project_id]);
        $POST_BACK_URL2 = 'complete.php';
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
            "paymentMethod"     => "",  //Optional
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
}
