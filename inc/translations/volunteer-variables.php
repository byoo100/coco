<?php
  if (get_locale() == 'ko_KR'){

    $label_contact_title = '연락처';

    $label_contact_name = '이름 (성, 명)';
    $label_contact_DoB  = '생년월일';
    $label_contact_street = '거리 주소';
    $label_contact_city = '시';
    $label_contact_state = '주';
    $label_contact_zip = '우편 번호';
    $label_contact_phone = '셀 전화/직장 전화';
    $label_contact_email = '이메일 주소';
    //=============

    $label_availability_title = '가능시간';
    $label_availability_text =
    '<p>봉사활동이 가능한 시간대는 언제입니까?</p>';

    $label_availability_asp = '방과후 프로그램';
    $label_availability_srp = '토요일 여가활동 프로그램';
    $label_availability_sp = '여름 프로그램';
    $label_monday = '월';
    $label_tuesday = '화';
    $label_wednesday = '수';
    $label_thursday = '목';
    $label_friday = '금';
    $label_morning = '아침';
    $label_afternoon = '오후';
    $label_both = '종일';
    //==========

    $label_reason_title = '봉사활동을 하고자 하는 이유';
    $label_reason_text =
    '<p>하기 항목중 하나에 표시해 주십시오.<br>
        *주: 봉사활동에 대한 일반적인 관심이란 개인적인 이득을 염두에 두지 않는 행동을 뜻합니다.
        [예. 연구, 학점 취득, 시, 주 또는 국가에서 부여한 봉사활동, 등등.]</p>';

    $label_highschool = '고등학교의 필수 봉사 활동 학점';
    $label_college = '대학의 필수 학점';
    $label_general = '봉사활동에 관한 일반적인 관심';
    $label_other = '기타';
    //===========

    $label_previous_title = '봉사 활동 경험과 특별한 재능/자격';
    $label_previous_text =
    '<p>귀하의 봉사활동 경험에 대해서 요약을 하고 봉사 활동 기간 동안 취득한 특별한 기능,
        음악적 재능, 예술적인 재능등을 기재해 주십시오.</p>';
    $label_previous_exp = '봉사 활동 경험';
    //=============

    $label_tos_title = '봉사활동 약관';
    $label_tos_text = apply_filters('the_content',$post->post_content);

    $label_tos_signature = '지원자 서명';
    $label_tos_date = '일자';
    $label_tos_guardian_signature = '보호자 서명';
    $label_tos_guardian_date = '일자';

  } else {

    $label_contact_title = 'Contact Information';

    $label_contact_name = 'Volunteer Name';
    $label_contact_DoB  = 'Date of Birth';
    $label_contact_street = 'Street Address';
    $label_contact_city = 'City';
    $label_contact_state = 'State';
    $label_contact_zip = 'ZIP Code';
    $label_contact_phone = 'Phone Number';
    $label_contact_email = 'Email Address';
    //============

    $label_availability_title = 'Availability';
    $label_availability_text =
    '<p>When will you be available for volunteer assignments?</p>';

    $label_availability_asp = 'After-school Program';
    $label_availability_srp = 'Saturday Recreational Program';
    $label_availability_sp = 'Summer Program';
    $label_monday = 'Monday';
    $label_tuesday = 'Tuesday';
    $label_wednesday = 'Wednesday';
    $label_thursday = 'Thursday';
    $label_friday = 'Friday';
    $label_morning = 'Morning';
    $label_afternoon = 'Afternoon';
    $label_both = 'Both';
    //===============

    $label_reason_title = 'Reason for Volunteering';
    $label_reason_text =
    '<p>Please mark one of the choices below.<br>
        *note: General interest in volunteering means that the volunteer is interested with no form of
        Personal gain in mind. [Ex. Research, Required credits for schools, Community service given by the
        City, State, or Country, etc.]</p>';

    $label_highschool = 'Mandatory High School Credit';
    $label_college = 'Mandatory College Credit';
    $label_general = 'General Interest in Volunteering';
    $label_other = 'Other Reason';
    //==================

    $label_previous_title = 'Previous Volunteer Experience and Special Skills/Qualifications';
    $label_previous_text =
    '<p>Summarize your previous volunteer experience and please address any special skills that
        you may have acquired during previous volunteer experiences,
        musical talents, artistic skills, etc.</p>';
    $label_previous_exp = 'Previous Experience';
    //==================

    $label_tos_title = 'Term Of Service';
    $label_tos_text = apply_filters('the_content',$post->post_content);

    $label_tos_signature = 'Signature';
    $label_tos_date = 'Date Signed';
    $label_tos_guardian_signature = 'Guardian Signature';
    $label_tos_guardian_date = 'Guardian Date Signed';
    //====================

    $label_emergency_title = 'Emergency Card';

    $label_emergency_name = 'Full Name';
    $label_emergency_dob = 'Date of Birth';
    $label_emergency_home_phone = 'Home Phone';
    $label_emergency_cell_phone = 'Cell Phone';
    $label_emergency_home_address = 'Home Address';
    $label_emergency_mother_name = 'Mother&#39;s Name';
    $label_emergency_mother_phone = 'Mother&#39;s Phone';
    $label_emergency_father_name = 'Father&#39;s Name';
    $label_emergency_father_phone = 'Father&#39;s Phone';
    $label_emergency_third_contact = 'Third Contact';
    $label_emergency_third_phone = 'Third Contact&#39;s Phone';
    $label_emergency_relationship_third = 'Relationship with Third Contact';
    $label_emergency_physician_1 = 'Family Physician (1st Choice)';
    $label_emergency_physician_1_phone = 'Family Physician (1st Choice) Phone';
    $label_emergency_hospital = 'Hospital of Choice';
    $label_emergency_physician_2 = 'Family Physician (2nd Choice)';
    $label_emergency_physician_2_phone = 'Family Physician (2nd Choice) Phone';
    $label_emergency_allergies = 'Allergies';
    $label_emergency_allergic_to = 'Allergic To';
    $label_emergency_usual_treatment = 'Usual Treatment';
    $label_emergency_medications = 'Medications';
    $label_emergency_medication_name = 'Medication Name';
    $label_emergency_medication_for = 'Used for';
    $label_emergency_other_health = 'Other Health Issues';
    $label_emergency_other_health_description = 'Describe Other Health Issues';



  }

?>
