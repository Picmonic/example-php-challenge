'use strict';

import React from 'react'
import { render } from 'react-dom'
import { Router, Route, IndexRoute, Link, browserHistory } from 'react-router'

import App from '../components/App/app.jsx';
import Home from '../components/Home/home.jsx';
import Test from '../components/Test/test.jsx';
import Commits from '../components/Commits/commits.jsx';
import NoMatch from '../components/NoMatch/no-match.jsx';

// Render the router
render((
	<Router history={browserHistory}>
		<Route path="/" component={App}>
			<IndexRoute component={Home} />
			<Route path="commits/:repository/:perpage" component={Commits}/>
			<Route path="test" component={Test}/>
			<Route path="*" component={NoMatch}/>
		</Route>
	</Router>
), document.getElementById('app'))