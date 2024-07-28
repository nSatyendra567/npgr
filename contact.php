<?php include 'partials/header.php'; ?>

<div class="container mx-auto py-12">
    <div class="w-4/5 mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-blue-700 mb-2 animate-color-change animate-heading">NPGRC Information Centre</h1>
            <p class="text-lg text-gray-600">Open from 10 AM to 5 PM, Closed on Saturdays and Sundays</p>
        </div>
        
        <div class="flex flex-col md:flex-row gap-8">
            <div class="bg-white shadow-lg rounded-lg p-8 flex-1">
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Language Support: Hindi, English, Malayalam, Telugu</h2>
                <p class="mb-2"><strong>Contact Numbers:</strong></p>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li><a href="tel:+919516064000">+91 95160 64000</a></li>
                    <li><a href="tel:+919711484000">+91 97114 84000</a></li>
                </ul>
                <p class="mb-4"><strong>Email:</strong> <a href="mailto:complaint@npgrcommission.in" class="text-blue-500 hover:underline">complaint@npgrcommission.in</a></p>
            </div>
            
            <div class="bg-white shadow-lg rounded-lg p-8 flex-1">
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Language Support: Kannada, Tamil</h2>
                <p class="mb-2"><strong>Contact Numbers:</strong></p>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li><a href="tel:+96179 62000">+91 96179 62000</a></li>
                    <li><a href="tel:+97114 84000">+91 97114 84000</a></li>
                </ul>
                <p class="mb-4"><strong>Email:</strong> <a href="mailto:complaint@npgrcommission.in" class="text-blue-500 hover:underline">complaint@npgrcommission.in</a></p>
            </div>
        </div>
    </div>
    
    <div class="mt-12 w-4/5 mx-auto">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="flex-1">
                    <label for="state-select" class="block text-lg font-semibold mb-2">Select your state:</label>
                    <select id="state-select" name="state" class="w-full border-2 border-gray-300 rounded-lg p-2" onchange="updateAddress()">
                    <option value="">Select your state</option>
                        <option value="delhi">Delhi</option>
                        <option value="kerala">Kerala</option>
                        <option value="goa">Goa</option>
                        <option value="dnh">Dadra and Nagar Haveli</option>
                        <option value="daman_diu">Daman and Diu</option>
                        <option value="chandigarh">Chandigarh</option>
                        <option value="bihar">Bihar</option>
                        <option value="assam">Assam</option>
                        <option value="andhra_pradesh">Andhra Pradesh</option>
                        <option value="gujarat">Gujarat</option>
                        <option value="punjab">Punjab</option>
                        <option value="himachal_pradesh">Himachal Pradesh</option>
                        <option value="jammu_kashmir">Jammu and Kashmir</option>
                        <option value="jharkhand">Jharkhand</option>
                        <!-- <option value="karnataka">Karnataka</option> -->
                        <option value="lakshadweep">Lakshadweep</option>
                        <option value="madhya_pradesh">Madhya Pradesh</option>
                        <option value="nagaland">Nagaland</option>
                        <option value="maharashtra">Maharashtra</option>
                        <option value="manipur">Manipur</option>
                        <option value="meghalaya">Meghalaya</option>
                        <option value="mizoram">Mizoram</option>
                        <option value="odisha">Odisha</option>
                        <option value="puducherry">Puducherry</option>
                        <option value="rajasthan">Rajasthan</option>
                        <option value="sikkim">Sikkim</option>
                        <!-- <option value="tamil_nadu">Tamil Nadu</option> -->
                        <option value="telangana">Telangana</option>
                        <option value="tripura">Tripura</option>
                        <option value="uttarakhand">Uttarakhand</option>
                        <option value="uttar_pradesh">Uttar Pradesh</option>
                        <option value="west_bengal">West Bengal</option>
                    </select>

                    <div id="address-details" class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    </div>
                </div>
            </div>
        
    </div>
</div>
<script>
        function updateAddress() {
            let state =document.getElementById('state-select').value;
            let addresses = [];
            switch (state) {
                case 'kerala':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Door No 70/1536, Ground Floor, Chammany Tower, Kaloor Cochin – 17, <br>Kerala State.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'delhi':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>CH-NO 313-3RD Floor E Block Karkardooma Court New Delhi 110035<br><strong>Email: </strong>complaint@npgrcommission.in');
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Rama Kant Gupta (advocate), CH. NO. 471 SAKET COURT <br>NEW DELHI-110017<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'dnh':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Behind Hotel Natraj, Near Char Rasta, Naroli Road, Silvassa 396230, <br>Dadra and Nagar Haveli Bombay High Court.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'daman_diu':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Bombay High Court, House No 2427, Khajuriya Street, <br>Daman and Diu.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'goa':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Norbert Fernandes (Advocate), Mila Bldg, 2nd Floor, Near sunshine laundry, Comba, Margao <br>Goa.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'chandigarh':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Sunil Mallan (Advocate), Seat No 52, Room No 32, New Bar Complex, <br>Punjab and Haryana High Court, <br>Chandigarh, India.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'bihar':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Vikash Chandra Srivastava (Advocate), A.G Coloney Ashiana Nagar <br>Patna Bihar High Court.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'assam':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Amal Dutta (Advocate), Jyoti Nibas, Bhabanipur, P.O./P.S. Noonmati, Guwahati-781020, Kamrup, Metropolitan, Assam, India.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'andhra_pradesh':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>B. Nageswara Rao (Advocate), 29-38-149, Eluru Road, Near Ramamandiram, Amaravarhi, Vijaywada, Andhra Pradesh-520015, India Andhra Pradesh High Court.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'gujarat':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Bhagyodaya Mishra (Advocate), C-402, Satej Appartment, Opp. Camway Five Star Hotel, Thaltej, Ahmedabad, Gujarat, India.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'punjab':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Bhavana Datta (Advocate), Office: #31-B, Garden Homes, 1st floor, Royale City, Zirakpur, Punjab, India.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'himachal_pradesh':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Tarun Pathak (Advocate), P.C. Chamber, Near Ritz Cinema Road Shimla, Himachal Pradesh, India.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'jammu_kashmir':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Javeed Hussain (Advocate), JK HIGH COURT AND SUBORDINATE COURTS, Jammu & Kashmir.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'jharkhand':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Shailesh Kumar (Advocate), Table No – 3 Common Jharkhand High Court Campus, Doranda, Ranchi, Jharkhand.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'lakshadweep':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Akthar Hajjigothi (Advocate), Lakshadweep Kerala High Court.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'madhya_pradesh':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Narendra Kumar Sharma (Advocate), Jabalpur, S-44 Samdariya Residency, Near High Court, Deohardag Jabalpur Madhya Pradesh.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'nagaland':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Inavili Chophy (Advocate), Kohima High Court Bench, Dimapur District Court, Nagaland.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'maharashtra':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Ujwala Shamrao Sapkale (Advocate), Kasturi Bhavan, Manera Gaon Road Ulhasnagar 4. Thane, Maharashtra.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'manipur':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Dhananjoy Singh (Advocate), Ch. Naoremthong Khulem Leikai, Manipur.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'meghalaya':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Uttam Prabhan (Advocate), 45 Jhalupara Cantonment Meghalaya.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'mizoram':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Rosilin (Advocate), Mizoram India.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'odisha':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Hiralal Kumawat (Advocate), Office No-3 Civil Court Campus Bhubaneswar Odisha.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'puducherry':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Venkatraman Jagan (Advocate), Office No 20 Main Street Puducherry.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'rajasthan':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Advocate Bhagwat Singh, Rajasthan Jaipur High Court.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'sikkim':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Namgyal Bhutia (Advocate), Room No. 2, New Building, High Court Premises, Gangtok, East Sikkim.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'telangana':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>H. M. Reddy (Advocate), Near High Court, Hyderabad Telangana.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'tripura':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Shyamol Kanti Das (Advocate), Agartala Tripura High Court.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'uttarakhand':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Praveen Tiwari (Advocate), High Court Nainital, Uttarakhand.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'uttar_pradesh':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Rakesh Tripathi (Advocate), Allahabad High Court Uttar Pradesh.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Arvind Tripathi (Advocate)<br>CH NO-203 Allahabad High Court, Prayagraj, Uttar Pradesh, India<br><strong>Email: </strong>complaint@npgrcommission.in');
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Sudha Pandey (Advocate)<br>CH.NO 163, New Building<br>Allahabad, High Court<br>Uttar Pradesh, India<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                case 'west_bengal':
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Paratha Pratin Biswas (Advocate)<br>Chamber, Near Main Gate District Bar Library, Judge\'s Court, at Barasat, North -24 Purganas, Kolkata 700124<br>West Bengal<br><strong>Email: </strong>complaint@npgrcommission.in');
                    addresses.push('State Legal Responsive Centre - for Mediation, Arbitration, Pre-Litigation Conciliation and Settlements (SLRC)<br>Avijit Bose (Advocate), Kolkata High Court, West Bengal.<br><strong>Email: </strong>complaint@npgrcommission.in');
                    break;
                default:
                    break;
            }
            document.getElementById('address-details').innerHTML=""
            addresses.forEach(address => {
                const card = document.createElement('div');
                card.className = 'bg-white shadow-lg rounded-lg p-6'; // Updated styling
                card.innerHTML = `
                    <h2 class="text-xl font-semibold mb-2 text-blue-700">Address Details</h2>
                    <p class="text-gray-700">${address}</p>
                `;
                document.getElementById('address-details').appendChild(card);
            });
            // document.getElementById('address-details').innerHTML = address;
            addresses=[];
    }
</script>

<?php include 'partials/logos.php'; ?>
<?php include 'partials/footer.php'; ?>
