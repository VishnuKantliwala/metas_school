<li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">About</a>
                                            <ul class="sub-menu">
                                                <li><a href="who-we-are"> Who we are </a></li>
                                                <li><a href="about-school"> About School </a></li>
                                                <li><a href="administrative-body"> Administrative Body </a></li>
                                                <!-- <li><a href="javascript:void(0)" class="have-child"> Our Mission, Vision & Core Values  </a></li>	-->
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">Academics</a>
                                            <ul class="sub-menu">
                                                <li><a href="courses"> Courses of Study </a></li>
                                                <?
                                                $sqlAcademics = $cn->selectdb("SELECT slug, service_title from tbl_service ORDER BY recordListingID");
                                                if( $cn->numRows($sqlAcademics) > 0 )
                                                {
                                                    while($rowAcademics = $cn->fetchAssoc($sqlAcademics))
                                                    {
                                                        extract($rowAcademics);
                                                        $href="academics/".$slug;
                                                ?>
                                                <li><a href="<?echo $href ?>"> <?echo $service_title ?> </a></li>
                                                <?
                                                    }
                                                }
                                                ?>
                                                
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">Admission</a>
                                            <ul class="sub-menu">
                                                <li><a href="fee-structure">Fee Structure</a> </li>
                                                <?
                                                $sqlAdmissions = $cn->selectdb("SELECT slug, blog_name from tbl_admission ORDER BY recordListingID");
                                                if( $cn->numRows($sqlAdmissions) > 0 )
                                                {
                                                    while($rowAdmissions = $cn->fetchAssoc($sqlAdmissions))
                                                    {
                                                        extract($rowAdmissions);
                                                        $href="admissions/".$slug;
                                                ?>
                                                <li><a href="<?echo $href ?>"> <?echo $blog_name ?> </a></li>
                                                <?
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>



                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">School Life</a>
                                            <ul class="sub-menu">
                                                <li><a href="school-life"> Overview </a></li>
                                                <li><a href="school-timings"> Timings of School Day </a></li>
                                                <li><a href="curriculum"> Curriculum </a></li>
                                                <!-- <li><a href="javascript:void(0)" class="have-child"> Assessment & Monitoring </a></li> -->
                                                <li class="menu-item-has-children">
                                                    <a href="javascript:void(0)" class="have-child">Co-curricular Activities</a>
                                                    <ul class="sub-menu2">
                                                        <li><a href="houses"> Houses </a></li>
                                                        <li class="menu-item-has-children">
                                                            <a href="javascript:void(0)" class="have-child">Sports</a>
                                                            <ul class="sub-menu">
                                                                <?
                                                                $sqlSports = $cn->selectdb("SELECT slug, sport_name from tbl_sport ORDER BY recordListingID");
                                                                if( $cn->numRows($sqlSports) > 0 )
                                                                {
                                                                    while($rowSports = $cn->fetchAssoc($sqlSports))
                                                                    {
                                                                        extract($rowSports);
                                                                        $href="sports/".$slug;
                                                                ?>
                                                                <li><a href="<?echo $href ?>"> <?echo $sport_name ?> </a></li>
                                                                <?
                                                                    }
                                                                }
                                                                ?>
                                                                
                                                            </ul>
                                                        </li>
                                                        <li><a href="school-band"> School Band </a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="javascript:void(0)" class="have-child">Outdoor Learning</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="field-trips"> Field Trips </a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="javascript:void(0)" class="have-child">Leisure & recreation</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="picnics"> Picnics </a></li>
                                                        <li><a href="tours"> Excursions & Tours </a></li>
                                                    </ul>
                                                </li>
                                                <!-- <li><a href="javascript:void(0)" class="have-child"> Student Well-being  </a></li> -->
                                            </ul>
                                        </li>


                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">Media</a>
                                            <ul class="sub-menu">
                                                <li><a href="photo-gallery"> Gallery </a></li>
                                                <li><a href="videos"> Videos </a></li>
                                                <li><a href="crescent-magazine"> Crescent Magazine </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">Online-Learning</a>
                                            <ul class="sub-menu">
                                                <li><a href="extramarks-online-learning"> Extramarks Online Learning </a></li>
                                                <li><a href="council-circulars"> Council Circulars (CISCE) </a></li>


                                                <li class="menu-item-has-children">
                                                    <a href="javascript:void(0)" class="have-child">School Content 2020-21</a>
                                                    
                                                    <ul class="sub-menu subtosub">
                                                        <?
                                                        $cn->getMenu(0,"","school-content/","",false,'tbl_downloadcategory',"tbl_download","download_name")
                                                        ?>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">Career</a>
                                            <ul class="sub-menu">
                                                <li><a href="hr-department"> HR Dept </a></li>
                                                <li><a href="current-openings"> Current Openings</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)" class="have-child">Alumni</a>
                                            <ul class="sub-menu">
                                                <li><a href="alumni-list"> Alumni </a></li>
                                                <li><a href="alumni-registration"> Register</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">Contact</a> </li>
                                        