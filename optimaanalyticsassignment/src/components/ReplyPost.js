import React, { useState } from 'react';
import { useForm } from 'react-hook-form';
import { NavLink } from 'react-router-dom';

const ReplyPost = () => {
	const { register, handleSubmit, errors } = useForm();
	const onReply = (reply) => {
		console.log(reply);
	}
	return (
		<>
		<h1 className="text-warning bg-white text-center">Reply Message</h1>
		<NavLink to="/" type="button" className="btn btn-success mb-2 align-right">Back to Posts</NavLink>
			<form onSubmit={handleSubmit(onReply)}>
				<div className="form-group">
					<label htmlFor="name">User Name: </label>
					<input ref={register({ required: true })} type="text" className="form-control" id="name" name="name" />
					<small className="form-text text-danger">{errors.name && 'Name is required'}</small>
				</div>
				<div className="form-group">
					<label htmlFor="email">User email: </label>
					<input ref={register({ required: true, email: true })} type="email" className="form-control" id="email" name="email" placeholder="abc@example.com" />
					<small className="form-text text-danger">{errors.name && 'Email is required'}</small>
				</div>
				<div className="form-group">
					<label htmlFor="reply">Reply Message</label>
					<textarea ref={register({ required: true })} className="form-control" id="reply" name="reply" rows="3"></textarea>
					<small className="form-text text-danger">{errors.name && 'Reply Message is required'}</small>
				</div>
				<button type="submit" className="btn btn-primary mb-2">Submit</button>
				</form>
				</>
	)
}

export default ReplyPost;
