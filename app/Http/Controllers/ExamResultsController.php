<?php 
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\ExamType;
use App\ExamName;
use App\ClassName;
use App\AcademicYear;
use App\SectionName;
use App\Subject;
use App\Student;
use App\MarkEntry;

class ExamResultsController extends Controller {

    public function grade_setting() {
        $grade = Grade::all();
        return view('admin.pages.exam_results.grade_setting', compact('grade'));
    }

    public function add_grade(Request $request) {
        $grade = new Grade;
        $grade->marks_from = $request->marks_from;
        $grade->marks_to = $request->marks_to;
        $grade->grade = $request->grade;
        $grade->grade_point = $request->grade_point;
        $grade->remark = $request->remark;
        $grade->save();

        return back()->with('success', 'Successfully Added');
    }

    public function exam_type() {
        $exam_type = ExamType::all();
        return view('admin.pages.exam_results.exam_type', compact('exam_type'));
    }

    public function add_exam_type(Request $request) {
        $exam_type = new ExamType;
        $exam_type->exam_type = $request->exam_type;
        $exam_type->save();

        return back()->with('success', 'Successfully Added');
    }

    public function exams() {
        $exam_type = ExamType::all();
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        $exam_name = ExamName::all();
        return view('admin.pages.exam_results.exam_name', compact('exam_name', 'exam_type', 'class_name', 'academic_year'));
    }

    public function add_new_exam(Request $request) {
        $exam_name = new ExamName;
        $exam_name->exam_name = $request->exam_name;
        $exam_name->exam_types_id = $request->exam_types_id;
        $exam_name->percentage_for_final = $request->percentage_for_final;
        $exam_name->class_start_from = $request->class_start_from;
        $exam_name->class_end_to = $request->class_end_to;
        $exam_name->total_classes = $request->total_classes;
        $exam_name->class_names_id = $request->class_names_id;
        $exam_name->academic_years_id = $request->academic_years_id;
        $exam_name->status = $request->status;
        $exam_name->save();

        return back()->with('success', 'Successfully Added');
    }

    public function mark_entries() {
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        return view('admin.pages.exam_results.mark_entry', compact('class_name', 'academic_year'));
    }

    public function ajax_view_section(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;

            $section = SectionName::where('class_names_id', $id)->get();
            view()->share('class_to_section', $section);
            $view1 = view('admin.pages.ajax_options.section')->render();

            $subject = Subject::where('class_names_id', $id)->get();
            view()->share('class_to_subject', $subject);
            $view2 = view('admin.pages.ajax_options.subject')->render();

            $exam_name = ExamName::where('class_names_id', $id)->get();
            view()->share('class_to_exam_name', $exam_name);
            $view3 = view('admin.pages.ajax_options.exam_name')->render();

            $info['res1'] = $view1;
            $info['res2'] = $view2;
            $info['res3'] = $view3;

            return response()->json($info);
        }
    }
    
    public function ajax_view_marks(Request $request) { //requires modification
        if($request->ajax()) {
           // $request->academic_years_id;
           // $request->class_names_id;
           $request->section_names_id;
           $request->subjects_id;
           $request->exam_names_id;
           
           $students= Student::where("section", $request->section_names_id)->get();
           view()->share('students', $students);

           $section_students=array();
           foreach ($students as $v) {
             $section_students[] = $v->id;
           };
           $ajax_marks_by_section= MarkEntry::where('subjects_id', $request->subjects_id)
                                          ->where('exam_names_id', $request->exam_names_id)
                                          ->whereIn('students_id', $section_students)
                                          ->get();
           
           view()->share('ajax_marks_by_section', $ajax_marks_by_section);
           $view4 = view('admin.pages.exam_results.ajax_view_mark_by_section')->render();
           
            $info['res4'] = $view4;
            return response()->json($info);
           
        }
    }

    public function mark_entry_by_section(Request $request) {
        $year = AcademicYear::find($request->academic_years_id);
        $class = ClassName::find($request->class_names_id);
        $subject = Subject::find($request->subjects_id);
        $exam_name = ExamName::find($request->exam_names_id);
        $section = SectionName::find($request->section_names_id);

        $section_id = $request->section_names_id;
        $students = Student::where('section', $section_id)->get();

        return view('admin.pages.exam_results.mark_entry_by_section', compact('students', 'year', 'class', 'subject', 'exam_name', 'section'));
    }
public function grade_point($total_mark, $subject_id, $written_mark, $oral_mark, $t1_mark, $t2_mark)
{
    $subject=Subject::find($subject_id);
    $sub_percentage= ($subject->written_mark + $subject->oral_mark + $subject->t1_mark + $subject->t2_mark) / 100;

    switch (true) {
        case ($total_mark <= 100*$sub_percentage && $total_mark >= 80*$sub_percentage ):
            $grade_point=5.00;
            break;
        case ($total_mark < 80*$sub_percentage && $total_mark >= 70*$sub_percentage ):
            $grade_point=4.00;
            break;
        case ($total_mark < 70*$sub_percentage && $total_mark >= 60*$sub_percentage ):
            $grade_point=3.50;
            break;
        case ($total_mark < 60*$sub_percentage && $total_mark >= 50*$sub_percentage ):
            $grade_point=3.00;
            break;
        case ($total_mark < 50*$sub_percentage && $total_mark >= 40*$sub_percentage ):
            $grade_point=2.5;
            break;
        case ($total_mark < 40*$sub_percentage ):
            $grade_point=0.00;
            break;
    };

    $written_pass=$subject->written_mark * 40 / 100;
    $oral_pass=$subject->oral_mark * 40 / 100;
    $t1_pass=$subject->t1_mark * 40 / 100;
    $t2_pass=$subject->t2_mark * 40 / 100;
    if($written_mark != null && $subject->written_mark != 0 && $written_mark < $written_pass){
        $grade_point = 0.00;
    };
    if($oral_mark != null && $subject->oral_mark != 0 && $oral_mark < $oral_pass){
        $grade_point = 0.00;
    };
    if($t1_mark != null && $subject->t1_mark != 0 && $t1_mark < $t1_pass){
        $grade_point = 0.00;
    };
    if($t2_mark != null && $subject->t2_mark != 0 && $t2_mark < $t2_pass){
        $grade_point = 0.00;
    };

    return $grade_point;
}

    public function save_mark_entry_by_section(Request $request) {
        $exam_names_id = $request->exam_names_id;
        $subject_id = $request->subjects_id;
        $total = ($request->total); 

        for ($i = 0; $i < $total; $i++) {
            $mark_entry = new MarkEntry;
            $mark_entry->exam_names_id = $exam_names_id;
            $mark_entry->subjects_id = $subject_id;
            $mark_entry->students_id = $request->students_id[$i];
            $written_mark= $request->written_mark[$i];
            $mark_entry->written_mark = $written_mark;
            $oral_mark= $request->oral_mark[$i];
            $mark_entry->oral_mark = $oral_mark;
            $t1_mark =  $request->t1_mark[$i];
            $mark_entry->t1_mark = $t1_mark;
            $t2_mark = $request->t2_mark[$i];
            $mark_entry->t2_mark = $t2_mark;
            $total_mark= $request->written_mark[$i] + $request->oral_mark[$i] + $request->t1_mark[$i] + $request->t2_mark[$i];
            $mark_entry->total_mark = $total_mark;
            
            $mark_entry->grade_point = $this->grade_point($total_mark, $subject_id, $written_mark, $oral_mark, $t1_mark, $t2_mark);
            $mark_entry->save();
        }
        return redirect('/mark-entries')->with('success', 'Successfully Updated Marks to the Section');
    }
    public function result_by_student_all_exam()
    {
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        return view('admin.pages.exam_results.result.result_by_student_all_exam', compact('class_name', 'academic_year'));
    }

    public function ajax_view_student(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;

            $student_list = Student::where('section', $id)->get();
            view()->share('section_to_student', $student_list);
            $view1 = view('admin.pages.exam_results.result.ajax_student_list')->render();

            $info['res1'] = $view1;

            return response()->json($info);
        }
    }

    public function ajax_view_single_student_result(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;

            $marks = MarkEntry::where('students_id', $id)->get();
            $exam_names = ExamName::all();
            $subject_names = Subject::all();
            view()->share('single_student_result', $marks);
            view()->share('exam_names', $exam_names);
            view()->share('subject_names', $subject_names);

            $view1 = view('admin.pages.exam_results.result.ajax_single_student_result')->render();

            $info['res1'] = $view1;

            return response()->json($info);
        }
    }
public function section_exam_result()
{
        $class_name = ClassName::all();
        $academic_year = AcademicYear::all();
        return view('admin.pages.exam_results.result.section_exam_result', compact('class_name', 'academic_year'));
}

    public function ajax_view_section_exam_result(Request $request) {
        if ($request->ajax()) {
           // $request->academic_years_id;
           // $request->class_names_id;
           $request->section_names_id;
           $request->exam_names_id;

           $students= Student::where("section", $request->section_names_id)->get();

           $section_students=array();
           foreach ($students as $v) {
             $section_students[] = $v->id;
           };
           $ajax_marks_by_section= MarkEntry::where('exam_names_id', $request->exam_names_id)
                                          ->whereIn('students_id', $section_students)
                                          ->get();

           
           view()->share('students', $students);
           view()->share('ajax_marks_by_section', $ajax_marks_by_section);

            $view1 = view('admin.pages.exam_results.result.ajax_view_section_exam_result')->render();

            $info['res1'] = $view1;

            return response()->json($info);
        }
    }
public function student_exam_result($students_id, $exam_names_id)
{
    $student=Student::find($students_id);
    $single_exam_marks=MarkEntry::where('students_id', $students_id)
                                ->where('exam_names_id', $exam_names_id)
                                ->get();
    return view('admin.pages.exam_results.result.student_exam_result', compact('student', 'single_exam_marks'));
}
// ===============================
    public function test(){

           echo "In test";

    }
}
