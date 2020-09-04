import React, { useContext } from "react";
import { PostContext } from "../context/PostContext";
import { useForm } from "react-hook-form";

const ReplyPost = (props) => {
  const { register, handleSubmit, errors } = useForm();

  const { state, addReply } = useContext(PostContext);
  const onReply = (data) => {
    addReply(data);
    props.replySuccess();
  };

  return (
    <>
      <h1 className="text-warning bg-white text-center">Reply Message</h1>
      <form onSubmit={handleSubmit(onReply)}>
        <input
          ref={register}
          type="hidden"
          name="post_id"
          value={props.postId}
        />
        <input
          ref={register}
          type="hidden"
          name="id"
          value={state.replies.length + 1}
        />
        <div className="form-group">
          <label htmlFor="name">User Name: </label>
          <input
            ref={register({ required: true })}
            type="text"
            className="form-control"
            id="name"
            name="name"
          />
          <small className="form-text text-danger">
            {errors.name && "Name is required"}
          </small>
        </div>
        <div className="form-group">
          <label htmlFor="email">User email: </label>
          <input
            ref={register({ required: true, email: true })}
            type="email"
            className="form-control"
            id="email"
            name="email"
            placeholder="abc@example.com"
          />
          <small className="form-text text-danger">
            {errors.email && "Email is required"}
          </small>
        </div>
        <div className="form-group">
          <label htmlFor="reply">Reply Message</label>
          <textarea
            ref={register({ required: true })}
            className="form-control"
            id="reply"
            name="reply"
            rows="3"
          ></textarea>
          <small className="form-text text-danger">
            {errors.name && "Reply Message is required"}
          </small>
        </div>
        <button type="submit" className="btn btn-primary mb-2">
          Submit
        </button>
      </form>
    </>
  );
};

export default ReplyPost;
