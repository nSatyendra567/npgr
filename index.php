<?php include 'partials/header.php' ?>

<main class="w-full h-fit">
    <div class="overflow-x-hidden flex justify-center">
        <div class="swiper bannerSwiper w-full flex justify-center items-center relative max-h-[70vh] md:max-h-[450px]">
            <div class="swiper-wrapper">
                <figure class="swiper-slide h-auto rounded-lg shadow-md bg-white flex flex-col text-brown gap-5">
                    <picture>
                        <!-- Mobile image -->
                        <source media="(max-width: 767px)" srcset="./images/mobile-image.png" />
                        <!-- Desktop image -->
                        <img class="w-full h-full object-cover" src="./images/banner1.png" alt="NPGRC" />
                    </picture>
                </figure>
                <figure class="swiper-slide h-auto rounded-lg shadow-md bg-white flex flex-col text-brown gap-5">
                    <picture>
                        <!-- Mobile image -->
                        <source media="(max-width: 767px)" srcset="./images/mobile-image1.png" />
                        <!-- Desktop image -->
                        <img class="w-full h-full object-cover" src="./images/banner2.png" alt="NPGRC" />
                    </picture>
                </figure>
                <figure class="swiper-slide h-auto rounded-lg shadow-md bg-white flex flex-col text-brown gap-5">
                    <picture>
                        <!-- Mobile image -->
                        <source media="(max-width: 767px)" srcset="./images/mobile-image2.png" />
                        <!-- Desktop image -->
                        <img class="w-full h-full object-cover" src="./images/banner3.png" alt="NPGRC" />
                    </picture>
                </figure>
            </div>
            <div class="swiper-button-next custom-swiper-button-next bg-light-blue w-10 h-10 flex justify-center items-center rounded-full absolute right-2 md:right-4"></div>
            <div class="swiper-button-prev custom-swiper-button-prev bg-light-blue w-10 h-10 flex justify-center items-center rounded-full absolute left-2 md:left-4"></div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto w-full gap-10 py-16 px-4">
        <!-- <h3 class="text-2xl md:text-3xl font-semibold text-center mb-5">Investigation Department</h3> -->
        <div class="flex flex-col md:flex-row items-start justify-center max-w-7xl mx-auto w-full gap-10">
            <!-- Swiper Section -->
            <!-- <figure class="md:w-2/5 w-full flex flex-col items-center">
                <img class="w-4/5 h-[350px] object-cover rounded-full" src="./images/judge-praveen.jpg" alt="NPGRC" />
                <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Judge</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Mr. Praveen Shah</p>
                <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Patron-in-Chief</p>
            </figure> -->
            <div class="swiper mySwiper md:w-2/5 w-full flex flex-col items-center">
                <div class="swiper-wrapper">
                    <figure class="swiper-slide md:w-2/5 w-full flex flex-col items-center">
                        <img class="w-4/5 h-[350px] object-cover rounded-full" src="./images/judge-praveen.jpg" alt="NPGRC" />
                            <p class="text-lg text-center text-blue font-bold mt-3">Hon'ble Judge</p>
                            <p class="text-lg text-center text-blue font-bold mb-3">Mr. Praveen Shah</p>
                            <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Patron-in-Chief</p>
                    </figure>
                    <figure class="swiper-slide md:w-2/5 w-full flex flex-col items-center">
                        <img class="w-4/5 h-[350px] object-cover rounded-full" src="./images/Rony.jpg" alt="NPGRC" />
                        <p class="text-lg text-center text-blue font-bold mt-3">Rony VP</p>
                        <p class="text-lg text-center text-blue font-bold mb-3">Advocate</p>
                        <p class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Chairman</p>
                    </figure>
                </div>
                <div class="swiper-button-next custom-swiper-button-next bg-light-blue w-10 h-10 flex justify-center items-center rounded-full absolute right-2 md:right-4"></div>
                <div class="swiper-button-prev custom-swiper-button-prev bg-light-blue w-10 h-10 flex justify-center items-center rounded-full absolute left-2 md:left-4"></div>
            </div>
    <!-- <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div> -->

            <!-- Center Image -->
            <div class="w-full md:w-1/5 md:h-[350px] flex items-center">
            <figure class="w-full flex justify-center">
                <img class="w-full h-[150px] md:h-[200px] object-contain" src="./images/npgrc-cut.png" alt="NPGRC" />
            </figure>
            </div>

            <!-- Right Image -->
            <figure class="md:w-2/5 w-full flex flex-col items-center">
                <img class="w-4/5 h-[350px] object-cover rounded-full" src="./images/lizo-square.jpg" alt="NPGRC" />
                <p class="text-lg text-center text-blue font-bold mt-3">Dr. Lijo Kuriydath</p>
                <p class="text-lg text-center text-blue font-bold mb-3">Director General</p>
                <a href="https://gofindy.com/drlijokuriyadath" target="_blank" class="text-center bg-yellow text-white rounded-md px-8 py-2 font-semibold">Connect with DG</a>
            </figure>
        </div>
    </section>


    <section class="max-w-7xl mx-auto w-full flex flex-col gap-5 px-4 md:px-0">
        <h2 class="text-2xl md:text-3xl font-semibold text-center">About NPGRC</h2>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
            Founded on September 9, 2017, the National Public Grievance and Redressal Commission (NPGRC) was established following recommendations made in 2017, aimed at creating a robust legal framework for addressing public grievances in India. Operating independently under the Indian constitution act, the commission holds jurisdiction over grievances spanning both public and private sectors. Led by Honorable Judge Mr. Birendra Singh as Member/Secretary, the NPGRC ensures thorough and impartial resolution of issues, upholding legal standards and promoting justice.
        </p>
        <p class="text-base md:text-lg leading-relaxed md:text-justify">
            The NPGRC operates within a comprehensive legal framework that includes key legislative acts crucial to its mandate. The Human Rights Act empowers the commission to investigate complaints related to violations of fundamental rights. Under the Child Welfare Act, the NPGRC intervenes in matters concerning the welfare and rights of children, ensuring their protection and well-being. The Women's Rights Act enables the commission to address grievances related to gender-based discrimination, harassment, and violence. Additionally, the Environmental Protection Act grants authority to investigate complaints regarding environmental degradation, pollution, and non-compliance with environmental regulations. These acts provide the NPGRC with the legal tools necessary to address a wide array of issues affecting public and private sectors.
        </p>
        <a style="background-color: rgb(234 179 8);" class="bg-yellow-500 text-center rounded-md px-8 py-2 text-white self-start font-semibold text-lg mt-3 block mx-auto md:mx-0" href="<?php ROOT_URL ?>about.php">Know More</a>
    </section>




    <section class="py-10 md:py-16 px-5 sm:px-10 md:px-16 lg:px-32">
        <h3 class="text-2xl md:text-3xl font-semibold mb-5 text-center">Our Process</h3>
        <div class="flex flex-col gap-5 max-w-7xl mx-auto px-4 md:px-0">
            <p class="text-base md:text-lg leading-relaxed md:text-justify">
                We have strong policies and procedures to follow. Key areas of case investigation including case management, responding to a case scene, interviewing, statement taking, gathering evidence, search warrants, and file presentation. The process of investigation or the investigative process is a series of activities or steps that include gathering evidence, analysing information, developing and validating theories, forming reasonable grounds to believe, and finally arresting and charging a suspect.
            </p>
        </div>
        <div class="max-w-7xl mx-auto w-full mt-10 mb-16">
            <h3 class="text-3xl font-bold text-center mb-10">The Seven Steps</h3>
            <div class="flex flex-wrap gap-5 items-center justify-center max-w-5xl mx-auto">
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fas fa-lock fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Securing the Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-users-between-lines fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Separating the<br>Witnesses</h4>
                </div>
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-user-secret fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Scanning the Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-eye fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Seeing the Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-user-pen fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Sketching the Scene</h4>
                </div>
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-brands fa-searchengin fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Searching for Evidence</h4>
                </div>
                <div class="md:w-56 md:h-56 h-[12rem] w-[12rem] rounded-full border-8 border-yellow flex flex-col items-center justify-center gap-3 hover:border-blue group transition-all duration-200 cursor-pointer">
                    <i class="fa-solid fa-user-shield fa-4x text-yellow group-hover:text-blue transition-all duration-200"></i>
                    <h4 class="sm:text-lg text-[15px] group-hover:text-yellow transition-all duration-200 text-center">Securing and Collecting Evidence</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="w-full min-h-screen flex gap-10  max-w-7xl mx-auto py-10 md:py-16">
        <div class="sm:w-9/12 w-11/12 flex flex-col gap-5 mx-auto">
            <h3 class="text-2xl md:text-3xl">Our Objectives and Duties</h3>
            <p class="mb-3 md:text-justify">The primary objective of the NPGRC, as defined under the Legal Services Authorities Act, 1987, is to provide a responsive and accountable platform for citizens to seek redressal of grievances against administrative actions. Its duties encompass:</p>
            <div class="w-full h-fit flex flex-col gap-5 mt-3">
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-balance-scale text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Facilitating Access to Justice</h4>
                        <p class="">Ensuring equitable access to grievance redressal mechanisms for all citizens, particularly the disadvantaged and marginalised.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-gavel text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Monitoring Government Agencies</h4>
                        <p class="">Overseeing the implementation of policies and programs to uphold procedural fairness and adherence to legal standards.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-file-alt text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Policy Advocacy</h4>
                        <p class="">Recommending systemic reforms and policy changes based on grievance outcomes to improve governance practices and public service delivery.
                        </p>
                    </div>
                </div>

            </div>
            <h3 class="mt-3 text-2xl md:text-3xl">Grievance Redressal Mechanisms</h3>
            <p class="mb-3">Central to its mandate, the NPGRC employs structured grievance redressal mechanisms outlined in the Legal Services Authorities Act, 1987. These include:</p>
            <div class="w-full h-fit flex flex-col gap-5 mt-3">
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-balance-scale text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Complaint Registration</h4>
                        <p class="">Allowing citizens to lodge complaints through various channels, including online portals, helplines, or physical submissions.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-gavel text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Inquiry and Investigation</h4>
                        <p class="">Conducting impartial inquiries, gathering evidence, and conducting hearings to resolve grievances efficiently and transparently.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-file-alt text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Timely Resolution</h4>
                        <p class="">Ensuring prompt responses and clear communication with complainants to maintain trust and confidence in the grievance redressal process.
                        </p>
                    </div>
                </div>

            </div>
            <h3 class="mt-3 text-2xl md:text-3xl ">Types of Cases Handled</h3>
            <p class="mb-3">The NPGRC addresses diverse grievances impacting public welfare and individual rights, including:</p>
            <div class="w-full h-fit flex flex-col gap-5 mt-3">
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-balance-scale text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Administrative Delays</h4>
                        <p class="">Complaints regarding delays in service delivery or response from government agencies.

                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-gavel text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Corruption Allegations</h4>
                        <p class="">Allegations of malpractice, bribery, or misuse of public resources by government officials.

                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-file-alt text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Service Deficiencies</h4>
                        <p class=""> Issues related to poor quality of service, negligence, or misconduct affecting public welfare.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-file-alt text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">
                            Environmental Concerns</h4>
                        <p class=""> Grievances concerning environmental degradation, pollution, or non-compliance with environmental regulations.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-file-alt text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Public Safety Issues</h4>
                        <p class=""> Complaints regarding inadequate safety measures, mishandling of emergencies, or lapses in law enforcement.

                        </p>
                    </div>
                </div>

            </div>
            <h3 class="mt-3 text-2xl md:text-3xl ">Challenges and Reform Initiatives</h3>
            <p class="mb-3">Despite its achievements, the NPGRC faces challenges such as resource constraints, procedural complexities, and the need for continuous improvement. Reform initiatives include:
            </p>
            <div class="w-full h-fit flex flex-col gap-5 mt-3">
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-balance-scale text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Legislative Amendments</h4>
                        <p class="">Proposals for legislative reforms to strengthen the legal framework and enhance the commission's powers and functions.
                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-gavel text-yellow fa-2x"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Technological Integration</h4>
                        <p class=""> Adopting technology-driven solutions for grievance management and improving accessibility for citizens.

                        </p>
                    </div>
                </div>
                <div class="flex items-center relative shadow w-full h-full rounded-md hover:scale-105 transition-all duration-200">
                    <div class="w-1/6 flex justify-center items-center relative text-white h-full rounded-tl-md rounded-bl-md">
                        <i class="fas fa-file-alt fa-2x text-yellow"></i>
                    </div>
                    <div class="w-4/5 flex flex-col gap-3 p-5 pl-10">
                        <h4 class="text-lg font-bold">Capacity Building</h4>
                        <p class=""> Training programs for staff and stakeholders to enhance efficiency, transparency, and responsiveness in grievance redressal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="w-3/12 flex justify-center items-start">
            <div class="w-96 h-fit p-5 shadow rounded">
            <h3 class="text-2xl text-center mb-3">Pending Cases</h3>
            <ul class="w-full flex flex-col gap-2 items-center">
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
                <li>Case needed to be handle</li>
            </ul>
            </div>
        </div> -->
    </div>
</main>
<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>