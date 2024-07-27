<?php
$state = isset($_POST['state']) ? $_POST['state'] : 'delhi'; // Default state if none is selected
$address = '';

switch ($state) {
    case 'kerala':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Door No 70/1536, Ground Floor, Chammany Tower, Kaloor Cochin – 17, <br>Kerala State.<br>Email: complaint@npgrcommission.in';
        break;
    case 'delhi':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>CH-NO 313-3RD Floor E Block Karkardooma Court New Delhi 110035<br>Email: complaint@npgrcommission.in';
        $address .= '<br>State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Rama Kant Gupta (advocate), CH. NO. 471 SAKET COURT <br>NEW DELHI-110017<br>Email: complaint@npgrcommission.in';
        break;
    case 'dnh':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Behind Hotel Natraj, Near Char Rasta, Naroli Road, Silvassa 396230, <br>Dadra and Nagar Haveli Bombay High Court.<br>Email: complaint@npgrcommission.in';
        break;
    case 'daman_diu':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Bombay High Court, House No 2427, Khajuriya Street, <br>Daman and Diu.<br>Email: complaint@npgrcommission.in';
        break;
    case 'goa':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Norbert Fernandes (Advocate), Mila Bldg, 2nd Floor, Near sunshine laundry, Comba, Margao <br>Goa.<br>Email: complaint@npgrcommission.in';
        break;
    case 'chandigarh':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Sunil Mallan (Advocate), Seat No 52, Room No 32, New Bar Complex, <br>Punjab and Haryana High Court, <br>Chandigarh, India.<br>Email: complaint@npgrcommission.in';
        break;
    case 'bihar':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Vikash Chandra Srivastava (Advocate), A.G Coloney Ashiana Nagar <br>Patna Bihar High Court.<br>Email: complaint@npgrcommission.in';
        break;
    case 'assam':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Amal Dutta (Advocate), Jyoti Nibas, Bhabanipur, P.O./P.S. Noonmati, Guwahati-781020, Kamrup, Metropolitan, Assam, India.<br>Email: complaint@npgrcommission.in';
        break;
    case 'andhra_pradesh':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>B. Nageswara Rao (Advocate), 29-38-149, Eluru Road, Near Ramamandiram, Amaravarhi, Vijaywada, Andhra Pradesh-520015, India Andhra Pradesh High Court.<br>Email: complaint@npgrcommission.in';
        break;
    case 'gujarat':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Bhagyodaya Mishra (Advocate), C-402, Satej Appartment, Opp. Camway Five Star Hotel, Thaltej, Ahmedabad, Gujarat, India.<br>Email: complaint@npgrcommission.in';
        break;
    case 'punjab':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Bhavana Datta (Advocate), Office: #31-B, Garden Homes, 1st floor, Royale City, Zirakpur, Punjab, India.<br>Email: complaint@npgrcommission.in';
        break;
    case 'himachal_pradesh':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Tarun Pathak (Advocate), P.C. Chamber, Near Ritz Cinema Road Shimla, Himachal Pradesh, India.<br>Email: complaint@npgrcommission.in';
        break;
    case 'jammu_kashmir':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Javeed Hussain (Advocate), JK HIGH COURT AND SUBORDINATE COURTS, Jammu & Kashmir.<br>Email: complaint@npgrcommission.in';
        break;
    case 'jharkhand':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Shailesh Kumar (Advocate), Table No – 3 Common Jharkhand High Court Campus, Doranda, Ranchi, Jharkhand.<br>Email: complaint@npgrcommission.in';
        break;
    case 'karnataka':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Rtd. Judge Kishan Dutt Kalaskar, No.74, 1st Floor, 6th Cross, Malleswaram, Bengaluru, Karnataka.<br>Email: complaint@npgrcommission.in';
        break;
    case 'lakshadweep':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Akthar Hajjigothi (Advocate), Lakshadweep Kerala High Court.<br>Email: complaint@npgrcommission.in';
        break;
    case 'madhya_pradesh':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Narendra Kumar Sharma (Advocate), Jabalpur, S-44 Samdariya Residency, Near High Court, Deohardag Jabalpur Madhya Pradesh.<br>Email: complaint@npgrcommission.in';
        break;
    case 'nagaland':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Inavili Chophy (Advocate), Kohima High Court Bench, Dimapur District Court, Nagaland.<br>Email: complaint@npgrcommission.in';
        break;
    case 'maharashtra':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Ujwala Shamrao Sapkale (Advocate), Kasturi Bhavan, Manera Gaon Road Ulhasnagar 4. Thane, Maharashtra.<br>Email: complaint@npgrcommission.in';
        break;
    case 'manipur':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Dhananjoy Singh (Advocate), Ch. Naoremthong Khulem Leikai, Manipur.<br>Email: complaint@npgrcommission.in';
        break;
    case 'meghalaya':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Uttam Prabhan (Advocate), 45 Jhalupara Cantonment Meghalaya.<br>Email: complaint@npgrcommission.in';
        break;
    case 'mizoram':
        $address = 'State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Rosilin (Advocate), Mizoram India.<br>Email: complaint@npgrcommission.in';
        break;
    default:
        $address = 'Please select a state to view address details.<br>Email: complaint@npgrcommission.in';
        break;
}


?>

<?php include 'partials/header.php'; ?>

<main class="container mx-auto py-12">
    <div class="w-4/5 mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-700 mb-2">NPGRC Information Centre</h1>
            <p class="text-lg text-gray-600">Open from 10 AM to 5 PM, Closed on Saturdays and Sundays</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-8">
            <div class="bg-white shadow-lg rounded-lg p-8 flex-1">
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Language Support: Hindi, English, Malayalam, Telugu</h2>
                <p class="mb-2"><strong>Contact Numbers:</strong></p>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li>+91 95160 64000</li>
                    <li>+91 97114 84000</li>
                </ul>
                <p class="mb-4"><strong>Email:</strong> <a href="mailto:complaint@npgrcommission.in" class="text-blue-500 hover:underline">complaint@npgrcommission.in</a></p>
            </div>
            
            <div class="bg-white shadow-lg rounded-lg p-8 flex-1">
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Language Support: Kannada, Tamil</h2>
                <p class="mb-2"><strong>Contact Numbers:</strong></p>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li>+91 96179 62000</li>
                    <li>+91 97114 84000</li>
                </ul>
                <p class="mb-4"><strong>Email:</strong> <a href="mailto:complaint@npgrcommission.in" class="text-blue-500 hover:underline">complaint@npgrcommission.in</a></p>
            </div>
        </div>
    </div>
    
    <div class="mt-12 w-4/5 mx-auto">
        <form method="POST" action="">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="flex-1">
                    <label for="state-select" class="block text-lg font-semibold mb-2">Select your state:</label>
                    <select id="state-select" name="state" class="w-full border-2 border-gray-300 rounded-lg p-2" onchange="this.form.submit()">
                        <option value="delhi" <?php if ($state == 'delhi') echo 'selected'; ?>>Delhi</option>
                        <option value="kerala" <?php if ($state == 'kerala') echo 'selected'; ?>>Kerala</option>
                        <option value="dnh" <?php if ($state == 'dnh') echo 'selected'; ?>>Dadra and Nagar Haveli</option>
                        <option value="daman_diu" <?php if ($state == 'daman_diu') echo 'selected'; ?>>Daman and Diu</option>
                        <option value="goa" <?php if ($state == 'goa') echo 'selected'; ?>>Goa</option>
                        <option value="chandigarh" <?php if ($state == 'chandigarh') echo 'selected'; ?>>Chandigarh</option>
                        <option value="bihar" <?php if ($state == 'bihar') echo 'selected'; ?>>Bihar</option>
                        <option value="assam" <?php if ($state == 'assam') echo 'selected'; ?>>Assam</option>
                        <option value="andhra_pradesh" <?php if ($state == 'andhra_pradesh') echo 'selected'; ?>>Andhra Pradesh</option>
                        <option value="gujarat" <?php if ($state == 'gujarat') echo 'selected'; ?>>Gujarat</option>
                        <option value="punjab" <?php if ($state == 'punjab') echo 'selected'; ?>>Punjab</option>
                        <option value="himachal_pradesh" <?php if ($state == 'himachal_pradesh') echo 'selected'; ?>>Himachal Pradesh</option>
                        <option value="jammu_kashmir" <?php if ($state == 'jammu_kashmir') echo 'selected'; ?>>Jammu & Kashmir</option>
                        <option value="jharkhand" <?php if ($state == 'jharkhand') echo 'selected'; ?>>Jharkhand</option>
                        <option value="karnataka" <?php if ($state == 'karnataka') echo 'selected'; ?>>Karnataka</option>
                        <option value="lakshadweep" <?php if ($state == 'lakshadweep') echo 'selected'; ?>>Lakshadweep</option>
                        <option value="madhya_pradesh" <?php if ($state == 'madhya_pradesh') echo 'selected'; ?>>Madhya Pradesh</option>
                        <option value="nagaland" <?php if ($state == 'nagaland') echo 'selected'; ?>>Nagaland</option>
                        <option value="maharashtra" <?php if ($state == 'maharashtra') echo 'selected'; ?>>Maharashtra</option>
                        <option value="manipur" <?php if ($state == 'manipur') echo 'selected'; ?>>Manipur</option>
                        <option value="meghalaya" <?php if ($state == 'meghalaya') echo 'selected'; ?>>Meghalaya</option>
                        <option value="mizoram" <?php if ($state == 'mizoram') echo 'selected'; ?>>Mizoram</option>
                    </select>

                    <div id="address-details" class="mt-6">
                        <!-- Display the address details based on selected state -->
                        <p><?php echo $address; ?></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include 'partials/logos.php'; ?>
<?php include 'partials/footer.php'; ?>
