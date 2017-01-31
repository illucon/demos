	<div class="box box-primary" id="add_grade">
		<div class="box-header with-border">
			<h3 class="box-title text-bold"> Result By Student</h3>
		</div>
		<div class="box-body">

		<table class="table table-bordered" style="background: lightgrey;">
			<tr>
				<th>Student Name</th>
				<th>: {{$single_student_result->first()->Student->first_name}} {{$single_student_result->first()->Student->last_name}}</th>

				<th>Class</th>
				<th>: {{$single_student_result->first()->Student->ClassName->class_name}}</th>
			</tr>
			<tr>
				<th>SID</th>
				<th>: {{$single_student_result->first()->Student->sid}}</th>
				<th>Section</th>
				<th>: {{$single_student_result->first()->Student->SectionName->section_name}}</th>
			</tr>
		</table>
		<br/>
		<table class="table table-bordered" style="background: lightgrey;">
		<?php $exams=$single_student_result->unique('exam_names_id')->pluck('exam_names_id'); ?>
		<?php $subjects=$single_student_result->unique('subjects_id')->pluck('subjects_id'); ?>
			<tr>
				<th>Subjects</th>		{{--columns per exam--}}		
				@foreach($exams as $v)     
				<th>

				<table class="table table-bordered" style="background: lightgrey;">
					<tr>
						<th colspan="3">{{$exam_names->find($v)->exam_name}}</th>
					</tr>
					<tr>
						<th>Wr-Or-T1-T2</th>
						<th>Total</th>
						<th>Point</th>
					</tr>
				</table>
				
				</th>
				@endforeach
			</tr>

			@foreach($subjects as $v_sub)			  {{--pluck subjects / rows per subject--}}
			<tr>
				<th>{{$subject_names->find($v_sub)->subject_name}}</th> 			{{--subject_namess collection--}}	

				@foreach($exams as $v_exm)					{{--main data / also columns per exam--}}

				<td>
				<?php 
				$result=$single_student_result->where('subjects_id', $v_sub)
									  ->where('exam_names_id', $v_exm)
									  ->first();
				?>
				<table class="table table-bordered" style="background: lightgrey;">
					<tr>
						<td>{{$result->written_mark."-"
							 .$result->oral_mark ."-"
							 .$result->t1_mark ."-"
							 .$result->t2_mark}}
						</td>
						<td>{{$result->total_mark}}</td>
						<td>{{$result->grade_point}}</td>
					</tr>
				</table>
				</td>

				@endforeach

			</tr>
			@endforeach

		</table>
		
		</div>
	</div>