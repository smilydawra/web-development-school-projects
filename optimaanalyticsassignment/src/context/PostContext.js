import React, { createContext, useReducer } from 'react';
import postData from '../server/db.json';

let PostContext = createContext();

let initialState = {
  posts: postData.posts,
  replies: postData.replies,
};

let reducer = (state, action) => {
  switch (action.type) {
    case 'ADD_POST':
      return { ...state, posts: [...state.posts, action.payload] };
    case 'DELETE_POST':
      return { ...state, posts: state.posts.filter((post) => post.id !== action.payload) };
    case 'ADD_REPLY':
      return { ...state, replies: [...state.replies, action.payload] };
    default:
      return state;
  }
};

const PostContextProvider = (props) => {
  const [state, dispatch] = useReducer(reducer, initialState);

  const addNewPost = (post) => {
    dispatch({
      type: 'ADD_POST',
      payload: post,
    });
  };

  const deletePost = (id) => {
    dispatch({
      type: 'DELETE_POST',
      payload: id,
    });
};

  const addReply = (reply) => {
	  dispatch({
		  type: 'ADD_REPLY',
		  payload: reply,
	  });
  };

  const value = { state, addNewPost, deletePost, addReply };

  return <PostContext.Provider value={value}>{props.children}</PostContext.Provider>;
};

let PostContextConsumer = PostContext.Consumer;

export { PostContext, PostContextProvider, PostContextConsumer };
