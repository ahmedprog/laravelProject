	<div class="row">
		<section class="content">
			<h1>Your Posts And Comments</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-filter" data-target="all">AllPosts</button>
								<button type="button" class="btn btn-default btn-filter" data-target="comments">AllComments</button>								
							@foreach($forums as $forum)
								<button type="button" class="btn btn-warning btn-filter" data-target="{{$forum->f_title}}">{{$forum->f_title}}</button>
							@endforeach
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
								@foreach($user->Posts as $post)
									<tr data-status="{{$post->forum->f_title}}">
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="uploads/post_photo/{{$post->photo}}" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">{{$post->created_at}}</span>
													<h4 class="title">
														{{$post->subject}}
														<span class="pull-right pagado">comments ({{count($post->comments)}})</span>
													</h4>
													<p class="summary">
														<a href="/posts/{{$post->id}}" class="btn  btn-link" role="button">Read More</a>													
													</p>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
									@foreach($user->comments as $comment)
									<tr data-status="comments">
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="uploads/post_photo/{{$comment->post->photo}}" class="media-photo">
												</a>
												<div class="media-body">
													<span class="media-meta pull-right">{{$comment->created_at}}</span>
													<h4 class="title">
														{{$comment->comment}}
													</h4>
													<p class="summary">
														<a href="/posts/{{$comment->post->id}}" class="btn  btn-link" role="button">Read More</a>													
													</p>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>	
	</div>