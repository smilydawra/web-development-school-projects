import React, { useState } from 'react';

const CreatePost = () => {
	const [posts, setPosts] = useState([])

	return(
		<>
		<h1 className="text-warning bg-white text-center">Add New Post</h1>
		<form>
			<div className="form-group">
				<label for="name">Author Name: </label>
				<input type="text" className="form-control" id="name" name="name" placeholder="name@example.com"/>
			</div>
			<div className="form-group">
				<label for="email">Author email: </label>
				<input type="email" className="form-control" id="email" name="email" placeholder="name@example.com"/>
			</div>
			<div className="form-group">
				<label for="body">Example Post</label>
				<textarea className="form-control" id="body" name="body" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Create Post</button>
		</form>
	</>
	)
}

export default CreatePost;
