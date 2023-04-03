<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

function normal_pagination($base_url, $current_page, $total_page, $prev_next = false) {

    $ends_count = 1;  //how many items at the ends (before and after [...])
    $middle_count = 2;  //how many items before and after current page
    $dots = false;

    if( $total_page == 1 ) return;
    ?>
    <!-- Pagination Start -->
    <section id="pagination" class="container pagination">
        <div class="row">
            <div class="col-12">
                
                <ul>
                    <?php
                        if( $prev_next && $current_page && 1 < $current_page ) {  //print previous button?
                            ?>
                                <li class="prev">
                                    <a href="<?php echo $base_url; ?>/<?php echo $current_page-1; ?>">&laquo; قبل</a>
                                </li>
                            <?php
                        }
                        for( $i = 1; $i <= $total_page; $i++ ) {
                            if( $i == $current_page ) {
                                ?>
                                    <li class="active">
                                        <a><?php echo $i; ?></a>
                                    </li>
                                <?php
                                $dots = true;
                            } else {
                                if( $i <= $ends_count || ($current_page && $i >= $current_page - $middle_count && $i <= $current_page + $middle_count) || $i > $total_page - $ends_count ) { 
                                    ?>
                                        <li>
                                            <a href="<?php echo $base_url; ?>/<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php
                                    $dots = true;
                                } elseif( $dots ) {
                                    ?>
                                        <li>
                                            <a>&hellip;</a>
                                        </li>
                                    <?php
                                    $dots = false;
                                }
                            }
                        }
                        if( $prev_next && $current_page && ($current_page < $total_page || -1 == $total_page) ) { //print next button?
                            ?>
                                <li class="next">
                                    <a href="<?php echo $base_url; ?>/<?php echo $current_page+1; ?>">بعد &raquo;</a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>

            </div>
        </div>
    </section>
    <!-- Pagination End -->
    <?php

}

function current_pagination($base_url, $current_page, $total_page, $prev_next = false) {

    $ends_count = 1;  //how many items at the ends (before and after [...])
    $middle_count = 2;  //how many items before and after current page
    $dots = false;

    if( $total_page == 1 ) return;
    ?>
    <!-- Pagination Start -->
    <section id="pagination" class="container pagination">
        <div class="row">
            <div class="col-12">
            
                <ul>
                    <?php
                        if( $prev_next && $current_page && 1 < $current_page ) {  //print previous button?
                            ?>
                                <li class="prev">
                                    <a href="<?php echo $base_url; ?>?page=<?php echo $current_page-1; ?>">&laquo; قبل</a>
                                </li>
                            <?php
                        }
                        for( $i = 1; $i <= $total_page; $i++ ) {
                            if( $i == $current_page ) {
                                ?>
                                    <li class="active">
                                        <a><?php echo $i; ?></a>
                                    </li>
                                <?php
                                $dots = true;
                            } else {
                                if( $i <= $ends_count || ($current_page && $i >= $current_page - $middle_count && $i <= $current_page + $middle_count) || $i > $total_page - $ends_count ) { 
                                    ?>
                                        <li>
                                            <a href="<?php echo $base_url; ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php
                                    $dots = true;
                                } elseif( $dots ) {
                                    ?>
                                        <li>
                                            <a>&hellip;</a>
                                        </li>
                                    <?php
                                    $dots = false;
                                }
                            }
                        }
                        if( $prev_next && $current_page && ($current_page < $total_page || -1 == $total_page) ) { //print next button?
                            ?>
                                <li class="next">
                                    <a href="<?php echo $base_url; ?>?page=<?php echo $current_page+1; ?>">بعد &raquo;</a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>

            </div>
        </div>
    </section>
    <!-- Pagination End -->
    <?php

}