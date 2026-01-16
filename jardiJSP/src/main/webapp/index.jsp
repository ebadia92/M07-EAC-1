<%-- 
    Document   : index.jsp
    Author     : Joel Monné Mesalles
--%>

<%@page import="java.util.Map"%>
<%@page import="java.util.HashMap"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jardí del Joel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
            font-size: 2em;
        }
        h1 b {
            color: #FF5733;
        }
        form {
            text-align: center;
            margin: 20px 0;
        }
        label {
            font-size: 1.2em;
        }
        select, input[type="submit"] {
            font-size: 1em;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #FF5733;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>Jardí del <b>Joel</b></h1>

    <%
        List<Map<String, String>> plantes = (List<Map<String, String>>) session.getAttribute("plantes");
        if (plantes == null) {
            plantes = new ArrayList<Map<String, String>>();

            Map<String, String> planta1 = new HashMap<String, String>();
            planta1.put("id", "0");
            planta1.put("nom", "Buguenvíl·lea");
            planta1.put("familia", "Nictaginàcies");
            planta1.put("tipus", "Exterior");
            planta1.put("descripcio", "Buguenvíl·lea de color blau");
            plantes.add(planta1);

            Map<String, String> planta2 = new HashMap<String, String>();
            planta2.put("id", "1");
            planta2.put("nom", "Calathea");
            planta2.put("familia", "Marantaceae");
            planta2.put("tipus", "Interior");
            planta2.put("descripcio", "Calathea gran de Mèxic");
            plantes.add(planta2);

            Map<String, String> planta3 = new HashMap<String, String>();
            planta3.put("id", "2");
            planta3.put("nom", "Ponsètia");
            planta3.put("familia", "Euphorbiaceae");
            planta3.put("tipus", "Interior");
            planta3.put("descripcio", "Flor de Nadal de l'any 2024");
            plantes.add(planta3);

            session.setAttribute("plantes", plantes);
        }

        String tipusFiltrat = request.getParameter("tipus");
        if (tipusFiltrat == null) {
            tipusFiltrat = "tots";
        }
        pageContext.setAttribute("tipusFiltrat", tipusFiltrat);
    %>

    <form method="get" action="index.jsp">
        <label for="tipus">Filtrar per tipus:</label>
        <select name="tipus" id="tipus">
            <option value="tots" <%= "tots".equals(tipusFiltrat) ? "selected" : "" %>>Tots</option>
            <option value="Interior" <%= "Interior".equals(tipusFiltrat) ? "selected" : "" %>>Interior</option>
            <option value="Exterior" <%= "Exterior".equals(tipusFiltrat) ? "selected" : "" %>>Exterior</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>

    <table>
        <tr>
            <th>Nom</th>
            <th>Família</th>
            <th>Tipus</th>
            <th>Descripció</th>
        </tr>
        <c:forEach var="planta" items="${sessionScope.plantes}">
            <c:if test="${tipusFiltrat == 'tots' || planta['tipus'] == tipusFiltrat}">
                <tr>
                    <td><a href="detalls.jsp?id=${planta['id']}">${planta['nom']}</a></td>
                    <td>${planta['familia']}</td>
                    <td>${planta['tipus']}</td>
                    <td>${planta['descripcio']}</td>
                </tr>
            </c:if>
        </c:forEach>
    </table>

    <div class="footer">
        <a href="afegir.jsp">Afegir una nova planta</a>
    </div>
</body>
</html>
