<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Role && Capability: role-sample - نمونه نقش و دسترسی

tr_roles()->add(
    'roel name', 
    ['read' => true],
    'نام نقش'
);