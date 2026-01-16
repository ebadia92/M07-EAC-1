<%-- 
    Document   : detalls.jsp
    Author     : Joel Monné Mesalles
--%>

<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalls de la planta</title>
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
            font-size: 2.5em;
        }
        h1 b {
            color: #FF5733;
        }
        .details-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
        }
        .details-container p strong {
            color: #4CAF50;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 1.2em;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #FF5733;
        }
    </style>
</head>
<body>
    <c:forEach var="planta" items="${sessionScope.plantes}">
        <c:if test="${planta.id == param.id}">
            <div class="details-container">
                <h1>Detalls de la planta: <b>${planta.nom}</b></h1>
                <p><strong>Família:</strong> ${planta.familia}</p>
                <p><strong>Tipus:</strong> ${planta.tipus}</p>
                <p><strong>Descripció:</strong> ${planta.descripcio}</p>
            </div>
        </c:if>
    </c:forEach>
    
    <a href="index.jsp">Tornar al meu jardí</a>
</body>
</html>
