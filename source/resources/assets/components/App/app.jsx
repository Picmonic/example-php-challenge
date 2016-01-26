'use strict';

import React from 'react'

import NavBar from '../NavBar/nav-bar.jsx';
import NavLink from '../NavBar/nav-link.jsx';

class App extends React.Component {
	render () {
		return (
			<div className="app-container">
				<NavBar title="Example PHP Challenge">
					<NavLink url="/">Home</NavLink>
				</NavBar>
				<div className="app-inner">
					{this.props.children}
				</div>
			</div>
		);
	}
}

export default App;