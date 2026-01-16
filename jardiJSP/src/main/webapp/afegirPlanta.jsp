<%-- 
    Document   : afegirPlanta.jsp
    Author     : Joel Monné Mesalles
--%>

<%@page import="java.util.HashMap"%>
<%@page import="java.util.Map"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>

<%
    String nom = request.getParameter("nom");
    String familia = request.getParameter("familia");
    String tipus = request.getParameter("tipus");
    String descripcio = request.getParameter("descripcio");

    List<Map<String, String>> plantes = (List<Map<String, String>>) session.getAttribute("plantes");
    if (plantes == null) {
        plantes = new ArrayList<Map<String, String>>();
        session.setAttribute("plantes", plantes);
    }

    Map<String, String> planta = new HashMap<String, String>();
    planta.put("id", String.valueOf(plantes.size()));
    planta.put("nom", nom);
    planta.put("familia", familia);
    planta.put("tipus", tipus);
    planta.put("descripcio", descripcio);

    plantes.add(planta);

    response.sendRedirect("index.jsp");
%>
