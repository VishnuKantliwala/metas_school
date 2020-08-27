<?
$page_id = 30;
$academic_id = 1;
include_once("header.php");
$sql = $cn->selectdb("select * from tbl_page where page_id =$page_id");
$row = $cn->fetchAssoc($sql);
extract($row);
?>



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay" style="background: url(page/big_img/<?echo $image?>)">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">
                        <?echo $page_name ?>
                    </h1>
                    <ul>
                        <li>
                            <a class="active" href="./">Home</a>
                        </li>
                        <li>
                            <?echo $page_name ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->


<div id="rs-courses-3" class="rs-courses-3 sec-spacer">
    <div class="container">

        <div class="row ">
            <div class="col-lg-12">
                <div class="course-item">
                    <div class="course-footer footcolor">
                        <div class="course-seats">
                            Exam Rules
                        </div>
                    </div>
                    <div class="course-body">
                        <div class="course-desc">

                            <div class="DescSec">
                                <ul style="padding-left:20px; list-style:none">
                                    <li>High academic standards are rendered irrelevant and inconsequential if the
                                        learning environment is undisciplined. Without proper discipline, teaching -
                                        learning activity becomes meaningless.</li><br />
                                    <li>Refinement of manners, habits of obedience and order, neatness in person and
                                        dress are required at all times.</li><br />
                                    <li>Order and silence must be maintained when moving around the school premises. No
                                        yelling, running or horseplay is allowed.</li><br />
                                    <li>Children need to be in school every working day. An absence will be excused only
                                        for reasons totally beyond one's control. In case of sickness, a doctor's
                                        certificate must be produced along with the parent's letter.</li><br />
                                    <li>A strong view will be taken of fabricated and fictitious medical certificate.
                                    </li><br />
                                    <li>Parents must refrain from sending students afflicted by contagious diseases to
                                        school, even during examinations, as they are health hazards for the other
                                        students.</li><br />
                                    <li>No pupil who has recently been suffering from any infectious or contagious
                                        illness, like measles, chicken-pox and conjunctivitis (red-eyes) will not be
                                        allowed to attend school, until permission has been granted by a registered
                                        medical practitioner. </li><br />
                                    <li>Children who miss examinations on this count will not be re-examined. Average
                                        marks will be calculated accordingly.</li><br />
                                    <li>Parents seeking leave for their guardians must submit a written application.
                                    </li><br />
                                    <li>Students absent for more than 15 days without leave could have their names
                                        struck off the school rolls. If readmission is sought, the right of admission
                                        will remain with the Principal I/C. If admission is granted the student will
                                        have to repay the admission fees.</li><br />
                                    <li>Students are advised not to bring valuables to the school. School takes no
                                        responsibility for the loss of valuable articles.</li><br />
                                    <li>Students should report and deposit found articles in the school office.</li>
                                    <br />
                                    <li>Girls are strictly prohibited from wearing any type of ornaments. Non-compliance
                                        could lead to confiscation of the ornaments.</li><br />
                                    <li>The use of mobile phones in school is prohibited. Breach of this regulation will
                                        lead to the phone being confiscated and a penalty of Rs. 500 will be levied.
                                    </li><br />
                                    <li>Students are strictly prohibited from bringing walkman, radios, tape recorders,
                                        electronic games to school, unless permission is granted by the teacher, and
                                        only for the sole purpose of instructions or practice for cultural programmes.
                                    </li><br />
                                    <li>All unauthorized items are liable to be confiscated and will not be returned to
                                        the students, but to their parents.</li><br />
                                    <li>No student should remain in the classrooms during the recess or games periods.
                                        Classrooms, other than their own are strictly out of bounds.</li><br />
                                    <li>During the absence of the class teacher, the class-monitor will assume full
                                        responsibility for the order and discipline of the class.</li><br />
                                    <li>Students are advised not to indulge in unhygienic habits and desist from buying
                                        eatables from vendors in and around the school. </li><br />
                                    <li>Any damage done in or about the school must be made good by the student who
                                        caused it, with actual cost or fine, or both.</li><br />
                                    <li>Students are expected to use the school's computer equipment both responsibly
                                        and productively. Students must have a staff member's permission before touching
                                        or operating a computer, before using any specific software, or before uploading
                                        or downloading anything. They must access only those files that they have
                                        created or that have been created for their use. Rules and guidelines regarding
                                        the operation of school computers will be detailed in the computer lab.</li>
                                    <br />
                                    <li>Students must respect privacy of email messages. Stealing passwords, tampering
                                        with another's email, sending offensive or intimidating messages, will lead to a
                                        strong disciplinary response.</li><br />
                                    <li>Students may not leave the school grounds before the end of the session without
                                        permission from the principal or the supervisors. </li><br />
                                    <li>The auditorium and stage areas can be used by students only under the direct
                                        supervision of a teacher.</li><br />
                                    <li>Students who play truant from school, popularly known as bunking, and remain
                                        absent without the knowledge of their parents, guardians or faculty will be
                                        dealt with severely. Punishment could include suspension and eventual expulsion.
                                    </li><br />
                                    <li>Irregular attendance, perpetual disobedience or defiance to authority or conduct
                                        injurious to the moral tone of the school could result in the student being
                                        asked to leave the school.</li><br />
                                    <li>The Principal will issue warning letters to erring students. Three such letters
                                        will entail automatic expulsion of the student from the school. </li><br />
                                    <li>All the students should be proud of their school and should maintain decorum and
                                        dignity not only in the school but, more importantly, outside the school, as
                                        well. Their behavior and conduct should reflect the high standards the school
                                        has set itself and they should prove themselves worthy ambassadors of the
                                        institution.</li><br />
                                    <li>The school reserves the right to require the withdrawal of any student whose
                                        behavior or academic performance indicates an inability or unwillingness to meet
                                        the requirements of the school or whose actions are injurious to self or others.
                                    </li><br />
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>


<script>
$(".DescSec ul li").prepend("<i class='fa fa-arrow-circle-o-right color'></i>");
</script>

<style>
.DescSec ul li i {
    padding-right: 20px;
    font-size: 20px;
}

.DescSec ul li {
    text-align: justify;
}
</style>