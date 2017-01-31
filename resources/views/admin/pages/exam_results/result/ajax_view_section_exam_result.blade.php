	<div class="box box-primary" id="add_grade">
		<div class="box-header with-border">
			<h3 class="box-title text-bold"> Section Exam Result</h3>
		</div>
		<div class="box-body">
		<h2 class="text-center text-bold">{{$ajax_marks_by_section->first()->ExamName->exam_name}} Result</h2>
		<table class="table table-bordered table-hover" style="background: lightgrey;">
			<tr>
				<th>SN</th>
				<th>Student Name</th>
				<th>SID</th>
				<th>Total</th>
				<th>GPA</th>
				<th>Grade</th>
				<th>Details</th>
			</tr>
		<?php $subjects=$ajax_marks_by_section->unique('subjects_id')->pluck('subjects_id')->all();
		 // echo "<pre>"; print_r($subjects); 
		 ?>
			@foreach($students as $v_student)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$v_student->first_name}} {{$v_student->last_name}}</td>
				<td>{{$v_student->sid}}</td>
				<td>

				<?php 
				$total_mark=$ajax_marks_by_section   
							->where('students_id', $v_student->id)
							->whereIn('subjects_id', $subjects)
							->all(); 
				$sum=0;
				foreach ($total_mark as $v_tm) {
					$sum += $v_tm->total_mark;
					};
				echo $sum;	
				?>

				</td>
				<td>

				<?php      // calculating grade point
				$i=0; $gp=0;
				foreach ($total_mark as $v_gp) {
					$i++;
					if($v_gp->grade_point == 0){
						$gp=0;
						break;
					};
					$gp += $v_gp->grade_point;
				};
				echo $grade_point=$gp / $i;
				?>

				</td>
				<td>

					<?php      //calculating Grade
					switch (true) {
			        case ($grade_point >= 5 ):
			            $grade="A+";
			            break;
			        case ($grade_point < 5 && $grade_point >= 4 ):
			            $grade="A";
			            break;
			        case ($grade_point < 4 && $grade_point >= 3.5 ):
			            $grade="A-";
			            break;
			        case ($grade_point < 3.5 && $grade_point >= 3 ):
			            $grade="B";
			            break;
			        case ($grade_point < 3 && $grade_point > 0 ):
			            $grade="C";
			            break;
			        case ($grade_point == 0 ):
			            $grade="F";
			            break;
			   		 };
			   		 echo $grade;
					$grade_point=0; //reinitialise $grade_point
					?>
					
				</td>
				<td><a href="{{url('/student-exam-result-'.$v_student->id.'-'.$ajax_marks_by_section->first()->exam_names_id)}}" class="btn btn-info btn-sm">Details</a></td>
			</tr>
			@endforeach

		</table>
		
		</div>
	</div>