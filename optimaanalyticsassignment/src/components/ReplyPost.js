import React, { useState, useEffect } from 'react';

const ReplyPost = () => {
	return (
		<main>
			<form>
				<div className="form-group">
					<label for="name">User Name: </label>
					<input type="text" className="form-control" id="name" name="name" placeholder="name@example.com" >
				</div>
				<div className="form-group">
					<label for="email">User email: </label>
					<input type="email" className="form-control" id="email" name="email" placeholder="name@example.com">
				</div>
				<div className="form-group">
					<label for="reply">Example Reply</label>
					<textarea className="form-control" id="reply" name="reply" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary mb-2">Submit</button>
				</form>
		</main>
	)
}

export default ReplyPost;
