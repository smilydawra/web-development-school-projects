import React from 'react';
import PostList from './components/PostList';
import CreatePost from './components/CreatePost';
import Header from './components/Header';
import Footer from './components/Footer';
import Banner from './components/Banner';
import SearchResult from './components/SearchResult';
import ReplyPost from './components/ReplyPost';
import { BrowserRouter, Switch, Route } from 'react-router-dom';
import './App.css';


function App() {
  return (
	  <BrowserRouter>
	  <Header/>
	  <main>
	  <div className="container">
	  <Banner/>
	  <Switch>
	  <Route path='/search/:search' exact component={SearchResult}></Route>
	  <Route path="/" exact component={PostList}></Route>
	  <Route path="/create" exact component={CreatePost}></Route>
	  <Route path="/reply" exact component={ReplyPost}></Route>
  	  </Switch>
	  </div>
	  </main>
	  <Footer/>
	  </BrowserRouter>
  )
}

export default App;
