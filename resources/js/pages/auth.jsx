
import React  from "react";

import { useForm, usePage } from '@inertiajs/react';

export default function () { 
    const { flash } = usePage().props

    const { data, setData, post, processing, errors } = useForm({
        username: '',
        password: '',
        remember_me: false,
    })

    function handleSubmit(e) {
      e.preventDefault()
      post('/authenticate')
    }

    console.log(errors);

    return (
      <div className="d-md-flex justify-content-center align-items-center flex-wrap" style={{height:"100vh"}}>
        <form className="card p-5 w-50" onSubmit={handleSubmit}>
            <div className="form-outline mb-4">
                <label className="form-label">Username</label>
                <input type="text" name="username" className="form-control"  onChange={e => setData('username', e.target.value)} />
                {errors.username && <div>{errors.username}</div>}
            </div>
        
            <div className="form-outline mb-4">
                <label className="form-label">Password</label>
                <input type="password" name="password" className="form-control"  onChange={e => setData('password', e.target.value)} />
            </div>
        
            <div className="row mb-4">
              <div className="col mb-4">
                <div className="form-check">
                  <input className="form-check-input" type="checkbox" defaultChecked  onChange={e => setData('remember_me', e.target.checked)}/>
                  <label className="form-check-label text-nowrap"> Remember me </label>
                </div>
              </div>
        
              <div className="col">
                <a href="#!">Forgot password?</a>
              </div>

              {flash.message && (
                <span class="text-danger w-100">{flash.message}</span>
              )}
            </div>
            
        
            <button type="submit" className="btn btn-primary btn-block mb-4">Sign in</button>
        
            <div className="text-center">
              <p>Not a member? <a href="#!">Register</a></p>
              <p>or sign up with:</p>
              <button type="button" className="btn btn-link btn-floating mx-1">
                <i className="fab fa-facebook-f"></i>
              </button>
        
              <button type="button" className="btn btn-link btn-floating mx-1">
                <i className="fab fa-google"></i>
              </button>
        
              <button type="button" className="btn btn-link btn-floating mx-1">
                <i className="fab fa-twitter"></i>
              </button>
        
              <button type="button" className="btn btn-link btn-floating mx-1">
                <i className="fab fa-github"></i>
              </button>
            </div>
        </form>
      </div>
    );
}