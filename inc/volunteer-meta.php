<?php

//https://code.tutsplus.com/tutorials/posting-via-the-front-end-advanced-submission--wp-27208



include_once('translations/volunteer-variables.php');


// Field Array
$prefix = 'coco_';
$contact_fields = array(
    array(
        'header'  => $label_contact_title,
        'type'    => 'header',
        'colspan' => 3
    ),
    array(
        'label'     => $label_contact_name,
        'id'        => $prefix.'contact_name',
        'type'      => 'text',
        'required'  => true,
        'colspan'   => 2,
        'break'     => false
    ),
    array(
        'label' => $label_contact_DoB,
        'id'    => $prefix.'contact_DoB',
        'type'  => 'date',
        'required' => true,
        'colspan' => 1,
        'break' => true
    ),
    array(
        'label' => $label_contact_street,
        'id'    => $prefix.'contact_street',
        'type'  => 'text',
        'required' => true,
        'colspan' => 3,
        'break' => true
    ),
    array(
        'label' => $label_contact_city,
        'id'    => $prefix.'contact_city',
        'type'  => 'text',
        'required' => true,
        'colspan' => 1,
        'break' => false
    ),
    array(
        'label' => $label_contact_state,
        'id'    => $prefix.'contact_state',
        'type'  => 'text',
        'required' => true,
        'colspan' => 1,
        'break' => false
    ),
    array(
        'label' => $label_contact_zip,
        'id'    => $prefix.'contact_zip',
        'type'  => 'text',
        'required' => true,
        'colspan' => 1,
        'break' => true
    ),
    array(
        'label' => $label_contact_phone,
        'id'    => $prefix.'contact_phone',
        'type'  => 'text',
        'required' => true,
        'colspan' => 1,
        'break' => false
    ),
    array(
        'label' => $label_contact_email,
        'id'    => $prefix.'contact_email',
        'type'  => 'email',
        'required' => true,
        'colspan' => 2,
        'break' => true
    )
);

$availability_fields = array(
    array(
        'header'  => $label_availability_title,
        'desc'    => $label_availability_text,
        'type'    => 'header',
        'colspan' => 3
    ),
    array(
        'label'     => $label_availability_asp,
        'id'        => $prefix.'availability_asp',
        'type'      => 'checkbox_group',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false,
        'options'   => array (
            'Mon' => array (
                'label' => $label_monday,
                'value' => 'Monday'
            ),
            'Tues' => array (
                'label' => $label_tuesday,
                'value' => 'Tuesday'
            ),
            'Wed' => array (
                'label' => $label_wednesday,
                'value' => 'Wednesday'
            ),
            'Thur' => array (
                'label' => $label_thursday,
                'value' => 'Thursday'
            ),
            'Fri' => array (
                'label' => $label_friday,
                'value' => 'Friday'
            )
        )//options
    ),
    array(
        'label'     => $label_availability_srp,
        'id'        => $prefix.'availability_srp',
        'type'      => 'checkbox_group',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false,
        'options'   => array (
            'Morning' => array (
                'label' => $label_morning,
                'value' => 'Morning'
            ),
            'Afternoon' => array (
                'label' => $label_afternoon,
                'value' => 'Afternoon'
            ),
            'Both' => array (
                'label' => $label_both,
                'value' => 'Both'
            )
        )//options
    ),
    array(
        'label'     => $label_availability_sp,
        'id'        => $prefix.'availability_sp',
        'type'      => 'checkbox_group',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false,
        'options'   => array (
            'Mon' => array (
                'label' => $label_monday,
                'value' => 'Monday'
            ),
            'Tues' => array (
                'label' => $label_tuesday,
                'value' => 'Tuesday'
            ),
            'Wed' => array (
                'label' => $label_wednesday,
                'value' => 'Wednesday'
            ),
            'Thur' => array (
                'label' => $label_thursday,
                'value' => 'Thursday'
            ),
            'Fri' => array (
                'label' => $label_friday,
                'value' => 'Friday'
            )
        )//options
    )
);

$reason_fields = array(
    array(
        'header'  => $label_reason_title,
        'desc'    => $label_reason_text,
        'type'    => 'header',
        'colspan' => 2
    ),
    array(
        'label'     => $label_reason_title,
        'id'        => $prefix.'reason_list',
        'type'      => 'radio',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false,
        'options'   => array (
            'HS' => array (
                'label' => $label_highschool,
                'value' => 'HS'
            ),
            'College' => array (
                'label' => $label_college,
                'value' => 'College'
            ),
            'General' => array (
                'label' => $label_general,
                'value' => 'General'
            ),
            'Other' => array (
                'label' => $label_other,
                'value' => 'Other'
            )
        )
    ),
    array(
        'label'     => $label_other,
        'id'        => $prefix.'reason_other',
        'type'      => 'textarea',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false
    )
);

$previous_fields = array(
    array(
        'header'  => $label_previous_title,
        'desc'    => $label_previous_text,
        'type'    => 'header',
        'colspan' => 1
    ),
    array(
        'label'     => $label_previous_exp,
        'id'        => $prefix.'prev_exp_text',
        'type'      => 'textarea',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false
    )
);


$term_of_service_fields = array(
    array(
        'header'  => $label_tos_title,
        'desc'    => $label_tos_text,
        'type'    => 'header',
        'colspan' => 2
    ),
    array(
        'label'     => $label_tos_signature,
        'id'        => $prefix.'tos_signature',
        'type'      => 'text',
        'required'  => true,
        'colspan'   => 1,
        'break'     => false
    ),
    array(
        'label'     => $label_tos_date,
        'id'        => $prefix.'tos_date',
        'type'      => 'date',
        'required'  => true,
        'colspan'   => 1,
        'break'     => true
    ),
    array(
        'label'     => $label_tos_guardian_signature,
        'id'        => $prefix.'tos_guardian_signature',
        'type'      => 'text',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false
    ),
    array(
        'label'     => $label_tos_guardian_date,
        'id'        => $prefix.'tos_guardian_date',
        'type'      => 'date',
        'required'  => false,
        'colspan'   => 1,
        'break'     => false
    )
);



$emergency_contact_fields = array(
    array(
        'header'  => $label_emergency_title,
        'type'    => 'header',
        'colspan' => 2
    ),
    array(
        'label'   => $label_emergency_name,
        'id'      => $prefix.'emergency_name',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_dob,
        'id'      => $prefix.'emergency_DoB',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_home_phone,
        'id'      => $prefix.'emergency_home_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_cell_phone,
        'id'      => $prefix.'emergency_cell_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_home_address,
        'id'      => $prefix.'emergency_home_address',
        'type'    => 'text',
        'colspan' => 2,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_mother_name,
        'id'      => $prefix.'emergency_mother_name',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_mother_phone,
        'id'      => $prefix.'emergency_mother_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_father_name,
        'id'      => $prefix.'emergency_father_name',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_father_phone,
        'id'      => $prefix.'emergency_father_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_third_contact,
        'id'      => $prefix.'emergency_third_contact',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_third_phone,
        'id'      => $prefix.'emergency_third_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_relationship_third,
        'id'      => $prefix.'emergency_relationship_third',
        'type'    => 'text',
        'colspan' => 2,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_physician_1,
        'id'      => $prefix.'emergency_physician_1',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_physician_1_phone,
        'id'      => $prefix.'emergency_physician_1_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_hospital,
        'id'      => $prefix.'emergency_hospital',
        'type'    => 'text',
        'colspan' => 2,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_physician_2,
        'id'      => $prefix.'emergency_physician_2',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => false
    ),
    array(
        'label'   => $label_emergency_physician_2_phone,
        'id'      => $prefix.'emergency_physician_2_phone',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_allergies,
        'id'      => $prefix.'emergency_allergies',
        'type'    => 'radio',
        'colspan' => 1,
        'break'   => false,
        'options' => array (
            'yes' => array (
                'label' => 'Yes',
                'value' => 'yes'
            ),
            'no' => array (
                'label' => 'No',
                'value' => 'no'
            )
        )
    ),
    array(
        'label'   => $label_emergency_allergic_to,
        'id'      => $prefix.'emergency_allergic_to',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_usual_treatment,
        'id'      => $prefix.'emergency_usual_treatment',
        'type'    => 'textarea',
        'colspan' => 2,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_medications,
        'id'      => $prefix.'emergency_medications',
        'type'    => 'radio',
        'colspan' => 1,
        'break'   => false,
        'options' => array (
            'yes' => array (
                'label' => 'Yes',
                'value' => 'yes'
            ),
            'no' => array (
                'label' => 'No',
                'value' => 'no'
            )
        )
    ),
    array(
        'label'   => $label_emergency_medication_name,
        'id'      => $prefix.'emergency_medication_name',
        'type'    => 'text',
        'colspan' => 1,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_medication_for,
        'id'      => $prefix.'emergency_medication_for',
        'type'    => 'textarea',
        'colspan' => 2,
        'break'   => true
    ),
    array(
        'label'   => $label_emergency_other_health,
        'id'      => $prefix.'emergency_other_health',
        'type'    => 'radio',
        'colspan' => 2,
        'break'   => true,
        'options' => array (
            'yes' => array (
                'label' => 'Yes',
                'value' => 'yes'
            ),
            'no' => array (
                'label' => 'No',
                'value' => 'no'
            )
        )
    ),
    array(
        'label'   => $label_emergency_other_health_description,
        'id'      => $prefix.'emergency_other_health_description',
        'type'    => 'textarea',
        'colspan' => 2,
        'break' => false
    )
);

?>
