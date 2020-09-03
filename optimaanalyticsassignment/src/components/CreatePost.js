import React, { useState } from 'react';
import { useForm } from 'react-hook-form';
import { NavLink } from 'react-router-dom';

const CreatePost = () => {
	const { register, handleSubmit, errors } = useForm();
	const submitPost = (data) => {
		console.log(data);
	}
	return(
		<>
		<h1 className="text-warning bg-white text-center">Add New Post</h1>
		<NavLink to="/" type="button" className="btn btn-success mb-2 align-right">Back to Posts</NavLink>
		<form onSubmit={handleSubmit(submitPost)}>
			<div className="form-group">
				<label htmlFor="name">Author Name: </label>
				<input ref={register({ required: true })} type="text" className="form-control" id="name" name="name" placeholder="Full Name"/>
				<small className="form-text text-danger">{errors.name && 'Author name is required'}</small>
			</div>
			<div className="form-group">
				<label htmlFor="email">Author email: </label>
				<input ref={register({ required: true, email: true })} type="email" className="form-control" id="email" name="email" placeholder="abc@example.com"/>
				<small className="form-text text-danger">{errors.email && 'Author Email is required'}</small>
			</div>
			<div className="form-group">
				<label htmlFor="post_title">Post Title: </label>
				<input ref={register({ required: true })} type="text" className="form-control" id="post_title" name="post_title" />
				<small className="form-text text-danger">{errors.name && 'Author name is required'}</small>
			</div>
			<div className="form-group">
				<label htmlFor="body">Post Detail</label>
				<textarea ref={register({ required: true })} className="form-control" id="body" name="body" rows="3"></textarea>
				<small className="form-text text-danger">{errors.body && 'Post Detail is required'}</small>
			</div>
			<button type="submit" className="btn btn-primary mb-2">Create Post</button>
		</form>
	</>
	)
}

export default CreatePost;
