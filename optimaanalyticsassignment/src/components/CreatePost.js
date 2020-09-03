import React, { useContext } from 'react';
import { useForm } from 'react-hook-form';
import { PostContext } from '../context/PostContext';
import { NavLink } from 'react-router-dom';

const CreatePost = (props) => {
	const { register, handleSubmit, errors } = useForm();

	const { state, addNewPost } = useContext(PostContext);
	const submitPost = (data) => {
		addNewPost(data);
		props.history.push('/');
	}
	return(
		<>
		<h1 className="text-warning bg-white text-center">Add New Post</h1>
		<NavLink to="/" type="button" className="btn btn-success mb-2 align-right">Back to Posts</NavLink>
		<form onSubmit={handleSubmit(submitPost)}>
			<input ref={register} type="hidden" name="id" value={state.posts.length+1}/>
			<div className="form-group">
				<label htmlFor="author_name">Author Name: </label>
				<input ref={register({ required: true })} type="text" className="form-control" id="author_name" name="author_name" placeholder="Full Name"/>
				<small className="form-text text-danger">{errors.name && 'Author name is required'}</small>
			</div>
			<div className="form-group">
				<label htmlFor="author_email">Author email: </label>
				<input ref={register({ required: true, email: true })} type="email" className="form-control" id="author_email" name="author_email" placeholder="abc@example.com"/>
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
